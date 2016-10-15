<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function index()
    {
        return __CLASS__;
    }

    public function informer()
    {
        return __METHOD__ ;
    }
}
