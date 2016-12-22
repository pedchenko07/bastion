<?php

namespace App\Repositories;
use File;
use Intervention\Image\Facades\Image as Img;


class ImageRepositories implements Imageable
{
    const PATH_IMG = "frontend/img/default/";

    public function saveImg($file, $path = self::PATH_IMG, $name = null,$flag = null)
    {
        if(is_null($name)) {
            $name = str_random(6);
        }
        $fileName = $name . '.' . $file->getClientOriginalExtension();
        if(!file_exists(public_path($path))) {
            mkdir($path,0766);
        }
        $img = Img::make($file);

        if(!is_null($flag)) {
            $img->save(public_path($path) . '/' . $fileName);
        } else {
            $img->resize(200, 200)->save(public_path($path) . '/' . $fileName);
        }

        return $fileName;
    }
    
    public function deleteImg($file, $path = self::PATH_IMG)
    {
        if(file_exists(public_path($path) . $file)) {
            return File::delete(public_path($path) . $file);
        }
        throw new \Exception('У категории нет картинок!');
    }
}