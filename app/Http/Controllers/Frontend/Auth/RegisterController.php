<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\UserRegistationMail;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    function register(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',

        ],
        [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email',
            'password.required' => 'Please enter your password',
        ]);

        $token = hash('sha256', time());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'token'=>$token,
            'status'=>'pending',
        ]);

        $varyficationUrl = url('/registration/verify/'.$token.'/'.$request->email);
        $subject = $request->name.' Please verify your email address';
        $body = 'Please click the link below to verify your email address. <br> <a href="'.$varyficationUrl.'">Verify Email</a>';
        Mail::to($request->email)->send(new UserRegistationMail($subject,$body));

        return redirect()->route("user.verification.notice")->with('success','Registration successfull. Please check your email for verification');

    }


}
