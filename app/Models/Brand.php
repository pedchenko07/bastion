<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use File;
class Brand extends Model
{
    protected $table = 'brands';
    
    const PATH_IMG = "frontend/img/brands/";


    public static function getAllBrands()
    {
        return self::where('parent_id', '=', '0')
            ->get();
    }

    public static function create(array $attributes = [])
    {
        return self::insert($attributes);
    }

    public static function getBrandById($id)
    {
        return self::whereId($id)->first();
    }

    public static function updateBrand($id,$data)
    {
        return self::whereId($id)->update($data);
    }

    public static function deleteById($id)
    {
        return self::whereId($id)->delete();
    }

    public static function getBrandsAndSubBrands()
    {
        $brands = self::getAllBrands();
        foreach($brands as $brand) {
            $brand->getSubBrands();
        }
        return $brands;
    }

    private function getSubBrands()
    {
        $this->subBrands = self::where('parent_id', '=', $this->id)
            ->get();
        return $this;
    }

    public function goods()
    {
        return $this->hasMany('App\Models\Goods');
    }
    
    public function children()
    {
        return $this->hasMany('App\Models\Brand', 'parent_id');
    }
}
