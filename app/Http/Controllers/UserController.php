<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function edit(Request $request, User $perfil): View
    {
        return view('user.edit',compact('perfil'));
    }
}
