<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';

    protected $fillable = ['name', 'price', 'keywords', 'country', 'brand_id', 'anons','content', 'new','hits','sale',
    'no_goods', 'visible'];
    
    public static function getGoodById($id)
    {
        return self::whereId($id)->first();
    }
    
    public static function updateGood($id,$data)
    {
        return self::whereId($id)->update($data);
    }
}
