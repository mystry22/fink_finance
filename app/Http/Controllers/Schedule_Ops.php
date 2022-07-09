<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;
use App\Models\User;
class Schedule_Ops extends Controller
{   
    private function getUsers (){
        $todate = date('Y-m-d');
        $users = User::where('next_pay_date', '=', $todate)->get();
        return $users;
    }
    
    public function send_reminder(){
        $user = self::getUsers();
        
        if(is_null($user)){}
    
        foreach($user as $user){
                require base_path("vendor/autoload.php");
                $mail = new PHPMailer(true); 
                try {
        
                    //Email server settings
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host = env('MAIL_HOST');            //  smtp host
                    $mail->SMTPAuth = true;
                    $mail->Username = env('MAIL_USERNAME');;   //  sender username
                    $mail->Password = env('MAIL_PASSWORD');;       // sender password
                    $mail->SMTPSecure = env('MAIL_ENCRYPTION');;                  // encryption - ssl/tls
                    $mail->Port = 465;                          // port - 587/465
        
                    $mail->setFrom('connect@fink.com.ng', 'Finker');
                    $mail->addAddress($user->email);
                    $mail->isHTML(true);                // Set email content format to HTML
                    $mail->Subject = 'Payment Due Date';
                    $mail->Body    = '
                                    Dear ' .$user->first_name.', 
                                    <br/><br> 
                                    Kindly note that your next payment is due for '.$user->next_pay_date.' and you can make payment
                                    to our account details below <br/><br> 
                                    Account Name: Fink Savings LTD<br />
                                    Account Number: 0203044044<br />
                                    GTB
                                    <br/><br> 
                                    Happy savings';
                    if( !$mail->send() ) {
                        dd('er');
                    }
                    
                    else {
                        dd('ok');
                    }
        
                } catch (Exception $e) {
                    return back()->with(['msg'=>'An Error Occured']);
                }

            
        }
       
    }
}
