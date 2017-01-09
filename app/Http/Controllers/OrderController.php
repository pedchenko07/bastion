<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function newOrders()
    {
        $orders = Order::newOrder();
        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function show($id)
    {
        $order = Order::find($id);

        return view('admin.orders.show', ['order' => $order]);
    }

    public function status($id)
    {
        Order::switchStatus($id);
        return back();
    }

    public function delete($id)
    {
        Order::find($id)->delete();
        return back();
    }
}
