<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReviewsController extends Controller
{
    public function index()
    {
        return view('admin.reviews.index');
    }
}
