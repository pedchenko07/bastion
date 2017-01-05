<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Goods;
use App\Models\Pages;
use App\Models\Review;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    private $data = [];

    public function __construct()
    {
        $this->data['brands'] = Brand::getAllBrands();
        $this->data['metrics'] = \App\Models\Metrics::getActive();
        $this->data['user'] = Auth::user();
        $this->data['pages'] = Pages::getAll();
    }

    public function index($id = 0)
    {
        if($id == 0) {
            return redirect()->route('site.reviews.index');
        }
        $this->data['good'] = Goods::getGoodById($id);
//        dd($this->data['good']);
        $this->data['product_id'] = $id;
        $this->data['reviews'] = Review::getAllProductById($id);
        $this->data['reviewsCount'] = Review::countProductReviews($id);
        return view('frontend.product', $this->data);
    }
}
