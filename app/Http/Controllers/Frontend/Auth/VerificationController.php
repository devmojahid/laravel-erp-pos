<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    function showNotice(){
        return view('frontend.auth.verify-email-notice');
    }
}
