<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function login()
    {
        return view('auth.guru_login');
    }

    public function auth(Request $request)
    {
        $credentiable = $request->validate([
            'nip_or_email' => 'required',
            'password' => 'required',
        ]);

        $loginGuru = filter_var($request->nip_or_email, FILTER_VALIDATE_EMAIL) ? 'email' : 'nip';

        if (Auth::guard('guru')->attempt([$loginGuru => $request->nip_or_email, 'password' =>$request->password])) {
            return redirect()->route('guru.dashboard')->with('succes', 'Login Berhasil');
        }

        return back()->withErrors(['login_error' => 'nip/email atau password salah'])->onlyInput('nip_or_email');
    }
}