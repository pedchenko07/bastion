<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageToSlider extends Model
{
    protected $table = 'image_to_slider';
    
    protected $fillable = ['slider_id','image', 'link'];
    
    const PATH_IMGSLIDERS = 'frontend/img/sliders/';
}
