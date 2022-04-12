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

    public function permissions(User $user): View
    {
        return view('admin.users.permissions.permission', compact('user'));
    }

    public function userPermissions(Request $request, User $user)
    {
        // dd($request->all());
        try {
            $permissions = [
                'dashboard' => $request->dashboard,
                'products.index' => $request->products_index,
                'products.store' => $request->products_store,
                'products.edit' => $request->products_edit,
                'products.destroy' => $request->products_destroy,
                'products.gallery' => $request->products_gallery,
                'gallery.destroy' => $request->gallery_destroy,
                'categories.index' => $request->categories_index,
                'categories.create' => $request->categories_create,
                'categories.edit' => $request->categories_edit,
                'categories.destroy' => $request->categories_destroy,
                'users.index' => $request->users_index,
                'users.create' => $request->users_create,
                'users.edit' => $request->users_edit,
                'users.destroy' => $request->users_destroy
            ];
            $permissions = json_encode($permissions);
            $user->update(['permissions' => $permissions]);

            return redirect()->back()->with('success','Los permisos fueron actualizados');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }
}
