<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index');
    }

    public function sliders()
    {
        return view('admin.news.sliders');
    }
}
