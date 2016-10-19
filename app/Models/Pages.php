<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';

    public static function create(array $attributes = [])
    {
        return self::insert($attributes);
    }

    public static function getAll()
    {
        return self::all();
    }
}
