<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MetricsController extends Controller
{
    public function index()
    {
        return view('admin.metrics.index');
    }
}
