<?php

namespace App\Repositories;
use File;
use Intervention\Image\Facades\Image as Img;


class ImageRepositories implements Imageable
{
    const PATH_IMG = "frontend/img/default/";
    const FULLSIZE = "frontend/img/fullsize/";

    public function saveImg($file, $path = self::PATH_IMG, $name = null,$flag = null)
    {
        if(is_null($name)) {
            $name = str_random(6);
        }
        $fileName = $name . '.' . $file->getClientOriginalExtension();
        if(!file_exists(public_path($path))) {
            mkdir($path,0755);
        }

        if(!file_exists(public_path(self::FULLSIZE))) {
            mkdir(self::FULLSIZE,0755);
        }
        $img = Img::make($file);

        if(is_null($flag)) {
            $img->resize(400, 200)->save(public_path($path) . '/' . $fileName);
        } elseif($flag == 1) {
            $img->resize(200, 200)->save(public_path($path) . '/' . $fileName);
        } else {
            $img->save(public_path(self::FULLSIZE . '/' . $fileName));
            $img->resize(400, 400)->save(public_path($path) . '/' . $fileName);
        }

        return $fileName;
    }
    
    public function deleteImg($file, $path = self::PATH_IMG)
    {
        if(file_exists(public_path($path) . $file)) {
             File::delete(public_path($path) . $file);
        }

        if(file_exists(public_path(self::FULLSIZE) . $file)) {
             File::delete(public_path(self::FULLSIZE) . $file);
        }

        return true;
    }
}