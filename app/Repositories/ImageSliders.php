<?php

namespace App\Repositories;

use Intervention\Image\Facades\Image as Img;

class ImageSliders implements Imageable
{
    public function saveImg($file, $path, $name, $flag = null)
    {
        $fileName = $name . '.' . $file->getClientOriginalExtension();

        if(!file_exists(public_path($path))) {
            mkdir($path, 0755);
        }

        $img = Img::make($file)->save(public_path($path) . '/' . $fileName);

        return $fileName;
    }

    public function deleteImg($file, $path)
    {
        // TODO: Implement deleteImg() method.
    }
}