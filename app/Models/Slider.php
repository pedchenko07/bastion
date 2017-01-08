<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';

    protected $fillable = ['name', 'status','type'];

    public function images()
    {
        return $this->hasMany('App\Models\ImageToSlider', 'slider_id');
    }
    
    public static function getAll()
    {
        return self::all();
    }
}
