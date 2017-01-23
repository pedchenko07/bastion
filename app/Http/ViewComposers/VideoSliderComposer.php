<?php

namespace App\Http\ViewComposers;
use App\Models\ImageToSlider;
use Illuminate\View\View;

class VideoSliderComposer
{
    public function compose(View $view)
    {
        $view->with('videoSliders', ImageToSlider::getActiveVideo());
    }
}