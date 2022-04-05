<?php

namespace App\Services;

use Image;

class ImageService {

    public function saveImage( $file ): String
    {
        $fileName = $file->hashName();
        $path = $file->storeAs('',$fileName, 'public');
        // Se crear miniatura
        $img = Image::make(asset('storage/'.$path))->resize(300, 200);
        $img->save('storage/'. 't_'.$fileName);

        return $path;
    }

}
