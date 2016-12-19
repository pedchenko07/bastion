<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data['brands'] = Brand::getBrandsAndSubBrands();
    }

    public function addProduct()
    {

        return view('admin.product.add_product', ['brands' => $this->data['brands']]);
    }
}
