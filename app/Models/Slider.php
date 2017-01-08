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

    public static function createVideoToSlider($slider,$links)
    {
        $data = [];
        foreach($links as $link) {
            $data[] = new ImageToSlider(['link' => $link]);
        }
        return $slider->images()->saveMany($data);
    }

    public static function createImgToSlider($slider,$images)
    {
        $data = [];
        foreach($images as $img) {
            $data[] = new ImageToSlider($img);
        }
        return $slider->images()->saveMany($data);
    }
}
