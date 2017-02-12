<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    public static function create(array $attributes = [])
    {
        return self::insert($attributes);
    }

    public static function getAll()
    {
        return self::all();
    }

    public static function deleteById($id)
    {
        return self::where('id', $id)->delete();
    }

    public static function getById($id)
    {
        return self::where('id', $id)->first();
    }

    public static function updateNews($data, $id)
    {
        return self::where('id', $id)->update($data);
    }

    public function getDate()
    {
        return Carbon::parse($this->date)->format('d-m-Y');
    }
}
