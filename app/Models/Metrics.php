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

    public static function create(array $attributes = [])
    {
        return self::insertGetId($attributes);
    }

    public static function editStatus($id, array $data)
    {
        return DB::update('update metrics set status = ? where id = ?', [$data['status'], $id]);
    }

    public static function dell($id)
    {
        return self::where('id', '=', $id)->delete();
    }
}
