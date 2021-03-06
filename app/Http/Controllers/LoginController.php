<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function loginForm()
    {
        if (in_array(Auth::user()->role->label, ['admin','supadmin'])) {
            $route = 'admin.index';
        }
        if (Auth::check()) {
            return redirect()->route('index');
        }
        return view('front.login.login');
    }
    public function registerForm()
    {
        if (Auth::check()) {
            return redirect()->route('index');
        }
        return view('front.login.register');
    }
}
