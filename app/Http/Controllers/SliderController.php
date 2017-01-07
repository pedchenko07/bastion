<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Validator;
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

    public function createImg(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $data = [
            'name' => $request->input('title'),
            'status' => $request->input('status') == 'on' ? '1' : '0',
            'type' => $request->input('type')
        ];

        $slider = Slider::create($data);

    }
}
