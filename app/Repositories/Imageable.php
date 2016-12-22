<?php

namespace App\Repositories;

interface Imageable{
    public function saveImg($file, $path, $name,$flag);
    public function deleteImg($file, $path);
}