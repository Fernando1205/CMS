<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::orderBy('id','desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function filter($status): View
    {
        $users = User::orderBy('id','desc')->where('status',$status)->paginate(10);
        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(User $user)
    {
        try {
            if($user->status != 100) {
                $user->update(['status' => 100]);
                $message = 'Usuario suspendido exitosamente';
            } else {
                $user->update(['status' => 0]);
                $message = 'Usuario activado exitosamente';
            }
            return redirect()->back()->with('success',$message);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }
}
