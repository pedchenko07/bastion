<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SliderController extends Controller
{  
    public function index()
    {
        $data['brands'] = $this->data['brands'];
        return view('admin.sliders.sliders', $data);
    }
    
    public function create()
    {
        $data['brands'] = $this->data['brands'];
        return view('admin.sliders.add_slider', $data);
    }
}
