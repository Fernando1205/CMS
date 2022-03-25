<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function login() : View
    {
        return view('Login.index');
    }

    public function register() : View
    {
        return view('Login.register');
    }
}
