<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function informer()
    {
        return view('admin.informers.index');
    }

    public function informerAdd()
    {
        return view('admin.informers.add');
    }

    public function informerEdit($id)
    {
        return view('admin.informers.add');
    }
    public function informerDelete($id)
    {
        return view('admin.informers.index');
    }
}
