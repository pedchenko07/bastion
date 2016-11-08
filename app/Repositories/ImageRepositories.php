<?php

namespace App\Repositories;
use File;


class ImageRepositories
{
    const PATH_IMG = "frontend/img/default/";

    public function saveImg($file,$path =  self::PATH_IMG)
    {
        $fileName = str_random(6) . '.' .$file->getClientOriginalExtension();
        if(!file_exists(public_path($path))) {
            mkdir($path,0766);
        }
        $file->move(public_path($path), $fileName);

        return $fileName;
    }
}