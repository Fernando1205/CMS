<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\MailRecoverRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\UserSendRecover;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

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

    public function login(LoginRequest $request)
    {
        try {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
                if(Auth::user()->status == 100){
                    return redirect('/logout');
                }
                return redirect('/admin');
            } else {
                return redirect()->back()->with('error','Credenciales invalidas');
            }
        }catch(\Throwable $th){
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }

    public function logout()
    {
        $status = Auth::user()->status;
        Auth::logout();
        if( $status == 100){
            return redirect('login')->with('message','Su usuario fue suspendido');
        }
        return redirect()->route('login');
    }

    public function recover(): View
    {
        return view('Login.recover');
    }

    public function mailRecover(MailRecoverRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            $code = rand(100000,999999);
            $data = ['user' => $user, 'code' => $code];
            $user->update(['password_code' => $code]);

            Mail::to($user->email)->send(new UserSendRecover($data));

            return redirect()->route('reset', ['email' => $user->email])->with('success','Correo enviado exitosamente');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Ha ocurrido un error');

        }

    }

    public function resetPassword(Request $request)
    {
        $data = ['email' => $request->get('email')];
        return view('Login.reset', $data);
    }
}
