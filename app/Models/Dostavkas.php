<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dostavkas extends Model
{
    protected $table = 'dostavkas';


    public static function createNew(array $data)
    {
        $delivery = New self();
        foreach ($data as $key => $value){
            $delivery->setAttribute($key, $value);
        }
        return $delivery->save();
    }

    public static function getAll()
    {
        return self::all();
    }

    public static function deleteById($id)
    {
        return self::whereId($id)->delete();
    }

    public static function updateById(array $data)
    {
        return self::whereId($data['id'])->update(['name' => $data['name']]);
    }

    public static function getById($id)
    {
        return self::select('id', 'name')->find($id);
    }

}
