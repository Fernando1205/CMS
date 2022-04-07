<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Image;

class ImageService {

    public function imageExist($path): bool
    {
        return Storage::exists('public/'.$path);
    }

    public function saveImage( $file ): String
    {
        $fileName = $file->hashName();
        $path = $file->storeAs('',$fileName, 'public');
        // Se crea miniatura
        $img = Image::make(asset('storage/'.$path))->resize(300, 200);
        $img->save('storage/'. 't_'.$fileName);

        return $path;
    }

    public function deleteImage($path): void
    {
        Storage::delete('public/'.$path);
        Storage::delete('public/t_'.$path);
    }

}
