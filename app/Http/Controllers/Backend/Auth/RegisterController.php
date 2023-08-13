<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('backend.auth.register');
    }


}
