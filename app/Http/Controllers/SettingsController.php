<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SettingsController extends Controller
{
    public function index()
    {
        return __CLASS__;
    }
    public function design()
    {
        return __CLASS__ . __METHOD__;
    }
}
