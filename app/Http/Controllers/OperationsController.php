<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use App\Mail\ContactMail;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;
use Auth;


class OperationsController extends Controller
{   
    private function getId (){
        $user = auth()->user();
        return $user;
    }
    private function eval($freq, $duration){
        
         $no_payments = floor($duration / $freq);
         return $no_payments;
    }
    private function schedule_pay(){
        $user = auth()->user();
        $userInfo = User::find($user);
        return $userInfo;
    }

    private  function gen(){
        $rand = rand(10000,20000);
        $planId = 'gplid'.$rand;
        return $planId;
    }
    private function process($freq,$period,$no_payments,$amount,$user,$end,$start,$goal){
        $single_payment = $amount/$no_payments;
        $myUser = User::find($user);
        $myUser->single_payment = $single_payment;
        $myUser->amount = $amount;
        $myUser->start = $start;
        $myUser->end = $end;
        $myUser->goal = $goal;
        $myUser->no_payment = $no_payments;
        $myUser->status = 'Pending';
        $myUser->freq = $freq;
        $myUser->next_pay_date = date('Y-m-d');
        $myUser->plan_activation = date('Y-m-d');
        $myUser->plan_id = self::gen();
        $myUser->save();

        if($myUser){
            return 'ok';
        }else{
            return 'not okay';
        }
        
    }

    private function update_db($name){
        $user = self::getId();
        $id = $user->id;
        $update = User::where('id', '=', $id)->update(['img'=>$name]);

        if(!$update){
            return 'err';
        }

        return 'ok';
        
    }
    public function view_dash(){
        return view('dashboard');
    }
    public function schedule(Request $request){
        $todate = date('Y-m-d');
        $formData = $request->validate([
            'freq'=> ['required'],
            'amount'=> ['required','integer'],
            'start'=> ['required', 'date','after:yesterday'],
            'end' => ['required','date','after:today'],
            'goal_name' => ['required'],

        ]);
        
         $user = auth()->user()->id;
         $freq = (int)$request->input('freq');
         $amount = $request->input('amount');
         $start = date($request->input('start'));
         $end = date($request->input('end'));
         $goal = $request->input('goal_name');
         $diff = strtotime($end) - strtotime($start);

     
         $period = floor($diff/(60*60*24));

         $no_payments = self::eval($freq,$period);
         if($freq == 7 && $no_payments > 52 || $freq == 30 && $no_payments > 12 ){
            return redirect('/create_goal')->with('err_msg', 'Max Allowed Duration Is 1Year');
            
         }
         $res = self::process($freq,$period,$no_payments,$amount,$user,$end,$start,$goal);
            if($res == 'ok'){
                return redirect('/plan_schedule')->with('good_msg','New Goal Added Successfully');
            }else{
                return redirect('/create_goal')->with('err_msg','We are Unable To Add Goal At The Moment');
            }
         
    }

    public function view_goal(){
        return view('goal');
    }

    public function schedule_plan(){
        $userData = self::schedule_pay();
        return view('/schedule');
    }

    public function get_pdf(){
        $user = self::getId();
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('schedule2'));

        
        $dompdf->render();
        $path = 'pdf/';
        $output = $dompdf->output();
        file_put_contents($path.'Payment_Schedule.pdf',$output);

        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true); 
        try {
 
            //Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'mail.fink.com.ng';            //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'connect@fink.com.ng';   //  sender username
            $mail->Password = 'mystry.123';       // sender password
            $mail->SMTPSecure = 'ssl';                  // encryption - ssl/tls
            $mail->Port = 465;                          // port - 587/465
 
            $mail->setFrom('connect@fink.com.ng', 'Finker');
            $mail->addAddress($user->email);
            //$mail->addCC($request->emailCc);
        //     //$mail->addBCC($request->emailBcc);
            $mail->addAttachment($path.'Payment_Schedule.pdf');
            $mail->isHTML(true);                // Set email content format to HTML
            $mail->Subject = 'Payment Schedule';
            $mail->Body    = 'Please Find attached payment schedule 
                              <br/><br> 
                              Kindly note that your first payment is due for '.$user->start.' and you can make payment
                              to our account details below <br/><br> 
                              Account Name: Fink Savings LTD<br />
                              Account Number: 0203044044<br />
                              GTB
                              <br/><br> 
                              Happy savings';
            if( !$mail->send() ) {
                return back()->with(['msg'=>'Unable to complete operation at the moment']);
            }
            
            else {
                return back()->with(['msg'=>'Data sent please check your email']);
            }
 
        } catch (Exception $e) {
             return back()->with(['msg'=>'An Error Occured']);
        }
        


        
    }

    public function upload_img(Request $request){
        $request->validate([
            'img'=> 'required|mimes:jpg,jpeg,png,gif|max:1000'
        ]);

        $name = time().'-'.$request->file('img')->getClientOriginalName();
        $isMoved = $request->img->move(public_path('assets/img/upload'), $name);
        if(!$isMoved){
            dd('err');
        }else{
            $hasUpdated = self::update_db($name);
            if($hasUpdated == 'err'){
                return back()->with(['msg'=>'Unable to Upload image']);
            }else{
                return back()->with(['msg'=>'Image Uploaded successfully']); 
            }
        }
    }

    public function getUsers (){
        $todate = date('Y-m-d');
        $users = DB::table('users')->where('next_pay_date', $todate)->get();
        dd($users);
    }

    
    
    
    
}
