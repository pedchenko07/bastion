<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';

    protected $fillable = ['name', 'status','type'];
    
    const SLIDER_STATUS = [
        'on' => 1,
        'off' => 0
    ];

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
    
    public static function getSliderById($id)
    {
        return self::whereId($id)->first();
    }
    
    public static function deleteSlider($slider)
    {
        $slider->images()->delete();
        return $slider->delete();   
    }
    
    public static function editStatus($id)
    {
        $slider = self::whereId($id)->first();
//        $slider->status == '1' ? $slider->status = self::SLIDER_STATUS['off'] : $slider->status = self::SLIDER_STATUS['on'];
//        return $slider->save();
        if($slider->status == '1') {
            $slider->status = self::SLIDER_STATUS['off'];
            $slider->save();
            
            return 'off';            
        } else {
            $slider->status = self::SLIDER_STATUS['on'];
            $slider->save();

            return 'on';
        }
    }
}
