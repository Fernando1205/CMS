<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarRequest;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\View\View;

class UserController extends Controller
{
    public function edit(User $perfil): View
    {
        return view('user.edit',compact('perfil'));
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
}
