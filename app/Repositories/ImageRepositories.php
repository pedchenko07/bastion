<?php

namespace App\Repositories;
use Exception;
use File;


class ImageRepositories
{
    const PATH_IMG = "frontend/img/default/";

    public function saveImg($file,$path =  self::PATH_IMG)
    {
        $fileName = str_random(6) . '.' .$file->getClientOriginalExtension();
        if(!file_exists(public_path($path))) {
            mkdir($path,0755);
        }
        $file->move(public_path($path), $fileName);

        return $fileName;
    }
    
    public function deleteImg($file,$path = self::PATH_IMG)
    {
        if(file_exists(public_path($path) . $file)) {
            return File::delete(public_path($path) . $file);
        }
        throw new Exception('У категории нет картинок!');
    }
}