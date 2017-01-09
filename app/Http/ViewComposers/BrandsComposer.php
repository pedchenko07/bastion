<?php

namespace App\Http\ViewComposers;
use App\Models\Brand;
use Illuminate\View\View;

class BrandsComposer
{
    public function compose(View $view)
    {
        $view->with('brands', Brand::getAllBrands());
    }
}