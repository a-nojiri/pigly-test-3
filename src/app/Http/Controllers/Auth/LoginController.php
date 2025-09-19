<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        
        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
            return redirect()->route('weight_logs.index'); 
        }

        
        return back()->withErrors([
            'email' => trans('auth.failed'),
        ])->onlyInput('email');
    }
}
