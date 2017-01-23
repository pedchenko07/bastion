<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageToSlider extends Model
{
    protected $table = 'image_to_slider';
    
    protected $fillable = ['slider_id','image', 'link'];
    
    const PATH_IMGSLIDERS = 'frontend/img/sliders/';

    public static function getActiveImg()
    {
        return self::whereHas('slider',function($query) {
            $query->where('status', \App\Models\Slider::SLIDER_STATUS['on']);
            $query->where('type', 'image');
        })->get();
    }

    public static function getActiveVideo()
    {
        return self::whereHas('slider', function($query) {
            $query->where('status', \App\Models\Slider::SLIDER_STATUS['on']);
            $query->where('type', 'video');
        })->get();
    }

    public function slider()
    {
        return $this->belongsTo('App\Models\Slider');
    }
}
