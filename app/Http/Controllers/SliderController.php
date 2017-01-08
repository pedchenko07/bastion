<?php

namespace App\Http\Controllers;

use App\Models\ImageToSlider;
use App\Models\Slider;
use App\Repositories\Imageable;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;

class SliderController extends Controller
{
    private $imageSliders;
    public function __construct(Imageable $imageable)
    {
        parent::__construct();
        $this->imageSliders = $imageable;
    }

    public function index()
    {
        $data['brands'] = $this->data['brands'];
        $data['sliders'] = Slider::getAll();
        
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
        $sliders = $request->file('sliders');
        $link = $request->input('link');

        for($i =0; $i < count($link); $i++) {
            $img = $this->imageSliders->saveImg($sliders[$i],ImageToSlider::PATH_IMGSLIDERS,$slider->id . '_' . $i, null);
            ImageToSlider::create([
                'slider_id' => $slider->id,
                'image' => $img,
                'link' => $link[$i]
            ]);
        }

        if($slider) {
            $mess= ['message' => "Слайдер добавлен!"];
        } else {
            $mess= ['error' => 'Ошибка в БД, повторите попытку!'];
        }

        return redirect()->route('sliders.index')->with($mess);
    }
}
