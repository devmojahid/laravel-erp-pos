<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecoverPasswordController extends Controller
{
    public function showRecoverPasswordForm()
    {
        return view('backend.auth.recover-password');
    }
}
