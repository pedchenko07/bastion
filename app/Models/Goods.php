<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';

    protected $fillable = ['name', 'price', 'keywords', 'country', 'goods_brandid', 'anons','content', 'new','hits','sale',
    'no_goods', 'visible'];

    public static function updateBaseImg($id,$imgName)
    {
        return self::whereId($id)
            ->update(['img' => $imgName]);
    }

    public static function updateGalleryImg($id,$name)
    {
        return self::whereId($id)
            ->update(['img_slide' => $name]);
    }
}
