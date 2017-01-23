<?php

namespace App\Http\ViewComposers;
use App\Models\ImageToSlider;
use Illuminate\View\View;

class ImgSliderComposer
{
    public function compose(View $view)
    {
        $view->with('imgSliders', ImageToSlider::getActiveImg());
    }
}