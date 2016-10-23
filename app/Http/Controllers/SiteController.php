<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    private $data = [];
    public function __construct()
    {
        $this->data['brands'] = Brand::getAllBrands();
        $this->data['metrics'] = \App\Models\Metrics::getActive();
        $this->data['user'] = Auth::user();
    }

    public function index()
    {
        return view('frontend.index', $this->data);
    }

    public function reviews()
    {

        $this->data['reviews'] = Review::getAllProductById();
        return view('frontend.reviews', $this->data);
    }

    public function reviewsSave(Request $request)
    {
        $data = $request->except('_token');
        $data['date'] = $data['created_at'] = Carbon::now();
        if(Review::create($data)) {
            $msg = 'Спасибо за Ваш отзыв, после модерации, отзыв будет опубликован!';
            $success = true;
        } else {
            $msg = 'Извините, но не получилось добавить отзыв, попробуйте позже.';
            $success = true;
        }

        return json_encode([
            'success' => $success,
            'msg' => $msg
        ]);
    }
}
