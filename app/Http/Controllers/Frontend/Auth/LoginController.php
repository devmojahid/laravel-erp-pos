<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if ($user->email_verified) {
                Auth::guard('user')->login($user);
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Please verify your email address.']);
            }
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect('/');
    }
}
