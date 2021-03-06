<?php

namespace App\Http\ViewComposers;
use App\Models\Pages;
use Illuminate\View\View;

class HeaderComposer
{
    public function compose(View $view)
    {
        $view->with('pages', Pages::getAll());
    }
}