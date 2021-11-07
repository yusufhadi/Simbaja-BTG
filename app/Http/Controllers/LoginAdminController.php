<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $crediential = $request->validate([
            'username' => 'required|string',
            'password' => 'required'
        ]);
        if (Auth::attempt($crediential)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
