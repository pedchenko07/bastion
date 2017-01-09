<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';

    const GOOD_IMG = "frontend/img/productID_";
    const VISIBLE = 1;

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

    /***
     * @param $ids array ids of products
     * @return array collection of goods
     */
    public static function getGoodsByIds($ids)
    {
        return self::whereIn('id' ,$ids)->get();
    }

    public static function getGoodsByBrandIds($ids)
    {
        return self::whereIn('brand_id',$ids)->get();
    }

    public static function getGoodsByBrandIdsOn($ids)
    {
        return self::whereIn('brand_id',$ids)->whereVisible(self::VISIBLE)->get();
    }
}
