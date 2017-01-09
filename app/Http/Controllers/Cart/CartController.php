<?php

namespace App\Http\Controllers\Cart;

use App\Http\Requests\OrderRequest;
use App\Models\Brand;
use App\Models\Goods;
use App\Models\Setting;
use App\Repositories\ImageRepositories;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function add($id)
    {
        $cart = null;
        if(Session::has('cart')){
            $cart = unserialize(Session::get('cart'));
        }
        if(!is_null($cart) && array_key_exists($id, $cart)) {
                $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }
        Session::put('cart', serialize($cart));
        return $cart;
    }

    public function delete($id)
    {
        if(!Session::has('cart')){
            return back();
        }

        $cart = unserialize(Session::get('cart'));

        if(array_key_exists($id, $cart)){
            unset($cart[$id]);
        }
        Session::put('cart', serialize($cart));
        return back();
        if(!is_null($cart) && array_key_exists($id, $cart)) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }
        Session::put('cart', serialize($cart));
        return $cart;
    }

    public function index()
    {
        // Поулчаем список товаров доступных на сайте
        $cart = unserialize(Session::get('cart', null));
        $productInCart = Goods::getGoodsByIds(array_keys($cart));

        // Подготавливаем товары к выводу, считаем общую стоимость и количество
        $totalQuantity = 0;
        $totalPrice = 0;
        $validGoods = [];
        foreach ($productInCart as $product) {
            $validGoods[$product->id] = $product->id;
            $product->quantity = $cart[$product->id];
            $totalQuantity += $product->quantity;
            $totalPrice += $product->quantity * $product->price;
            ImageRepositories::generateFullImgPath($product);
        }

        // Удаляем товары которых уже нет на сайте, или добавленные случайно
        if($noValidKey = array_diff_key($cart, $validGoods)){
            foreach (array_keys($noValidKey) as $array_key) {
                unset($cart[$array_key]);
            }
            Session::put('cart', serialize($cart));
        }

        return view('frontend.cart', [
            'productInCart' => $productInCart,
            'totalQuantity' => $totalQuantity,
            'totalPrice'    => $totalPrice,
            'money'         => Setting::getMoney()->money,
        ]);
    }

    public function getOrder(OrderRequest $request)
    {
        dd($request->all());
    }
}
