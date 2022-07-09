<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
        return view('home');
    }

    public function view_login(){
        return view('login');
    }

    public function view_signup(){
        return view('signup');
    }
    

    public function register(Request $request){
        
        $formData = $request->validate([
            'first_name'=> ['required','min:3'],
            'last_name'=> ['required','min:3'],
            'email'=> ['required',Rule::unique('users','email')],
            'password' => ['required','min:6']

        ]);
        

        $password = $request->input('password');
        $hashed = bcrypt($formData['password']);
        $newuser = User::create([
            'first_name'=> $request->input('first_name'),
            'last_name'=> $request->input('last_name'),
            'email'=> $request->input('email'),
            'password'=> $hashed,
        ]);

        auth()->login($newuser);
           return redirect('/dashboard');
       
        
    }

    public function authentication(Request $request){
        
        $formData = $request-> validate([
            'email'=> 'required|email',
            'password'=> 'required|min:6'
        ]);

        if(auth()->attempt($formData)){
            $request->session()->regenerate();
            return redirect('/dashboard');
        }else{
            return back()->withErrors(['email'=> 'Invalid Login'])->onlyInput('email');
        }

        
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
