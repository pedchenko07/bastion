<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Goods;
use App\Repositories\ImageRepositories;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;

class ProductController extends Controller
{
    private $data;
    private $imageRepositories;
    const GOOD_IMG = "frontend/img/productID_";

    public function __construct(ImageRepositories $imageRepositories)
    {
        $this->data['brands'] = Brand::getBrandsAndSubBrands();
        $this->imageRepositories = $imageRepositories;
    }

    public function addProduct($id)
    {
        $activeBrand = Brand::getBrandById($id);
        return view('admin.product.add_product', ['brands' => $this->data['brands'], 'activeBrand' => $activeBrand]);
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
            'goods_brandid' => $request->input('category'),
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
            $img = $this->imageRepositories->saveImg($baseimg,self::GOOD_IMG . $product->id,$product->id);
            Goods::updateBaseImg($product->id,$img);
        }

        if(isset($galleryimg[0]) && !empty($galleryimg)) {
            foreach($galleryimg as $key => $val) {
                $galleryName[] = $this->imageRepositories->saveImg($val,self::GOOD_IMG . $product->id, $product->id . '_' . $key );
            }
            
            Goods::updateGalleryImg($product->id,$galleryName = implode("|", $galleryName));
        }
        
        if($product) {
            $mess= ['message' => "Продукт добавлен!"];
        } else {
            $mess= ['error' => 'Ошибка в БД, повторите попытку!'];
        }
        return redirect()->route('category.all', $data['goods_brandid'])->with($mess);
    }
}
