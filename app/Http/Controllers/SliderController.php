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
        $links = $request->input('link');

        $img = [];
        if(!is_null($sliders[0]) && !empty($sliders[0])) {
            for($i =0; $i < count($sliders); $i++) {
                $img[$i]['image'] = $this->imageSliders->saveImg($sliders[$i],ImageToSlider::PATH_IMGSLIDERS,$slider->id . '_' . $i, null);
                $img[$i]['link'] = $links[$i]; 
            }
            Slider::createImgToSlider($slider,$img);
        }

        if($slider) {
            $mess= ['message' => "Слайдер добавлен!"];
        } else {
            $mess= ['error' => 'Ошибка в БД, повторите попытку!'];
        }

        return redirect()->route('sliders.index')->with($mess);
    }

    public function createVideo(Request $request)
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
        $links = $request->input('link');
        
        if(!empty($links[0])) {
            Slider::createVideoToSlider($slider,$links);
        }

        if($slider) {
            $mess= ['message' => "Слайдер добавлен!"];
        } else {
            $mess= ['error' => 'Ошибка в БД, повторите попытку!'];
        }

        return redirect()->route('sliders.index')->with($mess);
    }
    
    public function delete($id)
    {
        $slider = Slider::getSliderById($id);
        if($slider->type == 'image') {
            foreach($slider->images as $img) {
                $this->imageSliders->deleteImg($img->image, ImageToSlider::PATH_IMGSLIDERS);
            }
        }

        if(Slider::deleteSlider($slider)) {
            $mess= ['message' => "Слайдер удален!"];
        } else {
            $mess= ['error' => 'Ошибка в БД, повторите попытку!'];
        }

        return redirect()->route('sliders.index')->with($mess);
    }
}
