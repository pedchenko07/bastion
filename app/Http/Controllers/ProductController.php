<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{

    public function addProduct()
    {

        return view('admin.product.add_product', $this->data);
    }
}
