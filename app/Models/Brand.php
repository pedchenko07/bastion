<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use File;
class Brand extends Model
{
    protected $table = 'brands';

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
        $obj = self::getBrandById($id); //Получаем категорию
        $subBrands = $obj->getSubBrands(); //Получаем под категории
        if(count($subBrands) > 0) {
            return false;
        }
        return $obj->delete(); //Удаляем категорию и изображение
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
        return $this->subBrands = self::where('parent_id', '=', $this->id)
            ->get();

    }
}
