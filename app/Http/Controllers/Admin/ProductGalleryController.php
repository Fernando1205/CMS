<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductGallery;

class ProductGalleryController extends Controller
{
    public function destroy(ProductGallery $gallery)
    {
        try {
            $gallery->delete();
            return redirect()->back()->with('success','Imagen eliminada exitosamente');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Ha ocurrido un error');
        }

    }
}
