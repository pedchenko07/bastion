<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Goods;
use App\Repositories\Imageable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator;
use App\Http\Requests;

class ProductController extends Controller
{
    private $data;
    private $imageRepositories;

    public function __construct(Imageable $imageRepositories)
    {
        $this->data['brands'] = Brand::getBrandsAndSubBrands();
        $this->imageRepositories = $imageRepositories;
    }

    public function addProduct($brandId,$goodId = null)
    {
        $activeBrand = Brand::getBrandById($brandId);
        $good = null;
        if(!is_null($goodId)) {
            $good = Goods::getGoodById($goodId);
        }

        return view('admin.product.add_product',
            [
                'brands' => $this->data['brands'],
                'activeBrand' => $activeBrand,
                'good' => $good
            ]);
    }

    public function create(Request $request)
    {
        $messages = [
            'name.required' => 'У товара должно быть название'
        ];

        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ],$messages);

        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $data = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'keywords' => $request->input('keywords'),
            'country' => $request->input('country'),
            'brand_id' => $request->input('category'),
            'anons' => $request->input('anons'),
            'content' => $request->input('content'),
            'new' => is_null($request->input('new')) ? '0' : '1',
            'hits' => is_null($request->input('hits')) ? '0' : '1',
            'sale' => is_null($request->input('sale')) ? '0' : '1',
            'no_goods' => is_null($request->input('no_goods')) ? '0' : '1',
            'visible' => $request->input('visible'),
        ];

        $product = Goods::create($data);
        $baseimg = $request->file('baseimg');
        $galleryimg = $request->file('galleryimg');

        if(isset($baseimg) && !empty($baseimg)) {
            $img = $this->imageRepositories->saveImg($baseimg,Goods::GOOD_IMG . $product->id,$product->id);
            $product->img = $img;
            $product->update();
        }

        if(isset($galleryimg[0]) && !empty($galleryimg)) {
            foreach($galleryimg as $key => $val) {
                $galleryName[] = $this->imageRepositories->saveImg($val,Goods::GOOD_IMG . $product->id, $product->id . '_' . $key,$flag = 1 );
            }
            $product->img_slide = implode("|", $galleryName);
            $product->update();
        }
        
        if($product) {
            $mess= ['message' => "Продукт добавлен!"];
        } else {
            $mess= ['error' => 'Ошибка в БД, повторите попытку!'];
        }
        return redirect()->route('category.subCat', $data['brand_id'])->with($mess);
    }
    
    public function delete($id)
    {
        $good = Goods::getGoodById($id);
        if($good->img !== 'no_image.jpg') {
            $this->imageRepositories->deleteImg($good->img,Goods::GOOD_IMG . $good->id . '/');
        }

        if(!is_null($good->img_slide)) {
            $image = explode("|", $good->img_slide);
            foreach ($image as $img) {
                $this->imageRepositories->deleteImg($img,Goods::GOOD_IMG . $good->id . '/');
            }
        }

        if(file_exists(public_path(Goods::GOOD_IMG . $good->id))) {
            rmdir(public_path(Goods::GOOD_IMG . $good->id));
        }

        $brandId = $good->brand_id;

        if($good->delete()) {
            $mess= ['message' => "Продукт удален!"];
        } else {
            $mess= ['error' => 'Ошибка в БД, повторите попытку!'];
        }

        return redirect()->route('category.subCat', $brandId)->with($mess);
    }

    public static function update(Request $request,$brandId,$goodId)
    {
        $messages = [
            'name.required' => 'У товара должно быть название'
        ];

        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ],$messages);

        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'keywords' => $request->input('keywords'),
            'country' => $request->input('country'),
            'brand_id' => $request->input('category'),
            'anons' => $request->input('anons'),
            'content' => $request->input('content'),
            'new' => is_null($request->input('new')) ? '0' : '1',
            'hits' => is_null($request->input('hits')) ? '0' : '1',
            'sale' => is_null($request->input('sale')) ? '0' : '1',
            'no_goods' => is_null($request->input('no_goods')) ? '0' : '1',
            'visible' => $request->input('visible'),
        ];

        $good = Goods::updateGood($goodId,$data);

        if($good) {
            $mess= ['message' => "Продукт изменен!"];
        } else {
            $mess= ['error' => 'Ошибка в БД, повторите попытку!'];
        }

        return redirect()->route('category.subCat', $data['brand_id'])->with($mess);
    }
    
}
