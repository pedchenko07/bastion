<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Repositories\ImageRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator;
use App\Http\Requests;

class CategoryController extends Controller
{
    private $data = [];
    private $imageRepositories;
    const PATH_IMG = "frontend/img/brands/";

    /**
     * CategoryController constructor.
     * @param ImageRepositories $imageRepositories
     */
    public function __construct(ImageRepositories $imageRepositories)
    {
        $this->imageRepositories = $imageRepositories;
        $this->data['brands'] = Brand::getBrandsAndSubBrands();
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

        $brand['name'] = $request->input('brand_name');
        $brand['text'] = $request->input('text');
        $brand['parent_id'] = $request->input('parent_id');
        if(!empty($request->file('baseimg'))) {
            try{
                $brand['img'] = $this->imageRepositories->saveImg($request->file('baseimg'), self::PATH_IMG);
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withErrors($e)
                    ->withInput();
            }
        }

        if(Brand::create($brand)) {
            $mess= ['message' => "Категория создана!"];
        } else {
            $mess= ['error' => 'Ошибка в БД, повторите попытку!'];
        }
        return redirect()->route('category.index')->with($mess);
    }

    public function editCategory($id)
    {
        $brand = Brand::getBrandById($id);
        return view('admin.category.add', ['brand' => $brand, 'brands' => $this->data['brands']]);
    }

    public function updateCategory(Request $request)
    {
        $messages = [
            'brand_name.required' => 'Поле название категории, обязательное для заполнения!'
        ];

        $validator = Validator::make($request->all(),[
            'brand_name' => 'required'
        ],$messages);

        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $id['id'] = $request->input('id');
        $dataBrand['name'] = $request->input('brand_name');
        $dataBrand['parent_id'] = $request->input('parent_id');
        $dataBrand['text'] = $request->input('text');

        if(Brand::updateBrand($id,$dataBrand)) {
            $mess = ['message' => 'Категория обновлена!'];
        } else {
            $mess = ['error' => 'Ошибка БД!'];
        }
        return redirect()->route('category.index')->with($mess);

    }

    public function deleteCategory($id)
    {
        try {
            $brand = Brand::getBrandById($id);
            $this->imageRepositories->deleteImg($brand->img,self::PATH_IMG);
        } catch(\Exception $e) {
            Log::info($e->getMessage());
        }
        if(Brand::deleteById($id)) {
            $mess= ['message' => 'Категория удалена!'];
        } else {
            $mess = ['error' => 'Категория имеет подкатегории! Удалите сначала их или переместите в другую категорию.'];
        }

        return redirect()->route('category.index')->with($mess);
    }

    public function updateSubCategory($id)
    {
        $brand = Brand::getBrandById($id);
        return view('admin.category.cat', ['brands' => $this->data['brands'], 'brand' => $brand]);
    }

    public function categoryAll($id)
    {
        $brand = Brand::getBrandById($id);
        return view('admin.category.cat',['brands' => $this->data['brands'], 'brand' => $brand]);
    }
}
