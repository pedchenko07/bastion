<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metrics extends Model
{
    protected $table ='metrics';

    public static function getAll()
    {
        return self::all();
    }
}
