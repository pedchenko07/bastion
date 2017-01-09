<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';

    public static function getFirst()
    {
        return self::first();
    }

    public static function getFirstName()
    {
        return self::select('name_shop')->first();
    }

    public static function updateSettings(array $data)
    {
        return self::whereId(self::getIdSettings()->id)->update($data);
    }

    public static function getIdSettings()
    {
        return self::select('id')->first();
    }

    public static function getMoney()
    {
        return self::select('money')->first();
    }
}
