<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserInfoRequest;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\View\View;

class UserController extends Controller
{
    public function edit(User $perfil): View
    {
        return view('user.edit',compact('perfil'));
    }

    public function update(UserInfoRequest $request, User $perfil)
    {
        try {
            $perfil->update($request->validated());
            return redirect()->back()->with('success','Información de usuario actualizada correctamente');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }

    public function avatar(AvatarRequest $request, User $perfil,ImageService $imageService)
    {
        try {
            if(!is_null($perfil->avatar)){
                $imageService->deleteImage($perfil->avatar);
                $path = $imageService->saveImage($request->file('avatar'));
            }else {
                if($request->has('avatar')) {
                    $path = $imageService->saveImage($request->file('avatar'));
                }
            }

            $perfil->update(['avatar' => $path ?? '']);
            return redirect()->back()->with('success','Imagen actualizada correctamente');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }

    public function updatePassword(PasswordRequest $request, User $perfil)
    {
        try {
            $perfil->update(['password' => $request->newPassword]);
            return redirect()->back()->with('success','Contraseña actualizada correctamente');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }
}
