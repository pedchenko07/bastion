<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Goods;
use App\Repositories\Imageable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator;
use App\Http\Requests;
use App\Repositories\ImageRepositories;

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
            if($good->img != 'no_image.jpg') {
                ImageRepositories::generateFullImgPath($good);
            }
        }
        
        return view('admin.product.add_product',
            [
                'brands' => $this->data['brands'],
                'activeBrand' => $activeBrand,
                'good' => $good
            ]
        );
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
            $img = $this->imageRepositories->saveImg($baseimg,Goods::GOOD_IMG . $product->id,$product->id,$flag = 1);
            $product->img = $img;
            $product->update();
        }

        if(isset($galleryimg[0]) && !empty($galleryimg)) {
            foreach($galleryimg as $key => $val) {
                $galleryName[] = $this->imageRepositories->saveImg($val,Goods::GOOD_IMG . $product->id, $product->id . '_' . $key,$flag = 2 );
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

    public function update(Request $request,$brandId,$goodId)
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

        $baseimg = $request->file('baseimg');
        $galleryimg = $request->file('galleryimg');

        if(isset($baseimg) && !empty($baseimg)) {
            $img = $this->imageRepositories->saveImg($baseimg,Goods::GOOD_IMG . $goodId,$goodId,$flag = 1);
            $data['img'] = $img;
        }

        if(isset($galleryimg[0]) && !empty($galleryimg)) {
            $good = Goods::getGoodById($goodId);
            $slide = $good->img_slide;
            if(strpos($slide, "|")) {
                $slide = explode("|", $slide);
                $slide = array_pop($slide);
            }
            $key = !is_null($slide) ? substr($slide,(strpos($slide, ".") - 1), 1) : 0;
            $galleryName = !is_null($slide) ? explode("|", $good->img_slide) : [];
            foreach($galleryimg as $val) {
                $key++;
                $galleryName[] = $this->imageRepositories->saveImg($val,Goods::GOOD_IMG . $good->id, $good->id . '_' . $key,$flag = 2 );
            }

            $data['img_slide'] = implode("|", $galleryName);
        }

        $good = Goods::updateGood($goodId,$data);

        if($good) {
            $mess= ['message' => "Продукт изменен!"];
        } else {
            $mess= ['error' => 'Ошибка в БД, повторите попытку!'];
        }

        return redirect()->route('category.subCat', $data['brand_id'])->with($mess);
    }

    public function deleteImg(Request $request)
    {
        $good = Goods::getGoodById($request->input('id'));

        if($request->input('flag')) {
            $this->imageRepositories->deleteImg($good->img, Goods::GOOD_IMG . $good->id . '/');
            $good->img = 'no_image.jpg';
            $good->update();
        } else {
            $slide = $request->input('slide');
            $images = explode("|",$good->img_slide);
            unset($images[array_search($slide, $images)]);
            $this->imageRepositories->deleteImg($slide,Goods::GOOD_IMG . $good->id . '/');
            if($images) {
                $good->img_slide = implode("|", $images);
            } else {
                $good->img_slide = NULL;
            }
            $good->update();
        }

        return response()->json(['msg' => 'ok'],200);
    }
    
}
