<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function showLogin() : View
    {
        return view('Login.index');
    }

    public function showRegister() : View
    {
        return view('Login.register');
    }

    public function register(RegisterRequest $request) : RedirectResponse
    {
        try {
            User::create($request->validated());

            return redirect()->route('login')->with('success','Usuario creado exitosamente');

        } catch (\Throwable $th) {
            return redirect()->route('login')->with('error','Ha ocurrido un error');
        }

    }
}
