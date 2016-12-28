<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Metrics extends Model
{
    protected $table ='metrics';

    public static function getAll()
    {
        return self::all();
    }

    public static function getActive()
    {
        return self::where('status', 1)->get();
    }

    public static function create(array $attributes = [])
    {
        return self::insert($attributes);
    }

    public static function editStatus($id, array $data)
    {
        return self::where('id', $id)->update($data);
    }

    public static function dell($id)
    {
        return self::where('id', $id)->delete();
    }
}
