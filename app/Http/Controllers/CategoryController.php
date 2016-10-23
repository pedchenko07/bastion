<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;

class CategoryController extends Controller
{
    private $data = [];

    public function __construct()
    {
        $this->data['brands'] = Brand::getAllBrands();
    }

    public function index()
    {
        return view('admin.category.index', $this->data);
    }

    public function addCategory()
    {
        return view('admin.category.add',$this->data);
    }

    public function createCategory(Request $request)
    {
        $messages = [
            'brand_name.required' => 'Поле название категории, обязательное для заполнения!',
            'baseimg.image' => 'Загруженный файл должен быть картинкой!',
            'baseimg.mimes' => 'Картинки только в формате png, jpeg!'
        ];

        $validator = Validator::make($request->all(), [
            'brand_name' => 'required',
            'baseimg' => 'image|mimes:jpeg,png'
        ],$messages);

        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $brand['img']= $request->file('baseimg');
        $this->saveImg($brand['img']);
        $brand['name'] = $request->input('brand_name');
        $brand['text'] = $request->input('text');
        $brand['parent_id'] = $request->input('parent_id');
    }

    public function saveImg($file)
    {
        dd($file);
    }
}
