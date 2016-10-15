<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NewsController extends Controller
{
    public function index()
    {
        return __CLASS__;
    }

    public function sliders()
    {
        return __CLASS__ . __METHOD__;
    }
}
