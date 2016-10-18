<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

use App\Http\Requests;

class SiteController extends Controller
{
    public function index()
    {
        $brands = Brand::getAllBrands();
        $metrics = \App\Models\Metrics::getActive();

        return view('frontend.index', [
            'brands'    =>  $brands,
            'metrics'   =>  $metrics,
        ]);
    }
}
