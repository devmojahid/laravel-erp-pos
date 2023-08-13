<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('backend.auth.forgot-password');
    }
}
