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

    public static function getPageById($id)
    {
        return self::whereId($id)->first();
    }

    public static function updatePage($id,$data)
    {
        return self::whereId($id)->update($data);
    }

    public static function deleteById($id)
    {
        return self::whereId($id)->delete();
    }
}
