<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function index()
    {
        $this->data['brands'] = Brand::getBrandsAndSubBrands();
        return view('admin.users.index', $this->data);
    }

    public function informer()
    {
        return view('admin.informers.index', $this->data);
    }

    public function informerAdd()
    {
        return view('admin.informers.add', $this->data);
    }

    public function informerEdit($id)
    {
        return view('admin.informers.add', $this->data);
    }
    public function informerDelete($id)
    {
        return view('admin.informers.index', $this->data);
    }
}
