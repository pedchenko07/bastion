<?php

namespace App\Http\Controllers\Cart;

use App\Http\Requests\OrderRequest;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\Goods;
use App\Models\Oplata;
use App\Models\Order;
use App\Models\Setting;
use App\Models\ZakazTovar;
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
        if(!Session::has('cart')) {
            return view('frontend.cart', [
                'productInCart' => []
            ]);
        }
        $cart = unserialize(Session::get('cart'));
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
            'oplata'        => Oplata::all()
        ]);
    }

    public function getOrder(OrderRequest $request, Order $order, Customer $customer)
    {
        $customer->name = $request->input('name', 'гость');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->city = $request->input('city');
        $customer->adres = $request->input('address');
        if($customer->payment_type = $request->input('oplata', false)){
            $first = Oplata::first();
            if($first){
                $customer->payment_type = $first->id;
            } else {
                $customer->payment_type = 1;
            }
        }
        $customer->save();

        $order->customer_id = $customer->id;
        $order->date = date("Y-m-d H:i:s");
        $order->dostavka_id = $request->input('dostavka_id', 1);
        $order->oplata_id = $request->input('oplata', 1);
        $order->status = 0;
        $order->prim = $request->input('comment');
        $order->save();

        $cart = unserialize(Session::pull('cart', null));
        $productInCart = Goods::getGoodsByIds(array_keys($cart));


        foreach ($productInCart as $product) {
            $tovar = new ZakazTovar();
            $tovar->orders_id = $order->id;
            $tovar->goods_id = $product->id;
            $tovar->quantity = $cart[$product->id];
            $tovar->name = $product->name;
            $tovar->price = $product->price;
            $tovar->save();
            unset($tovar);
        }

        return back()->withSuccess('Заказ успешно оформлен! Спасибо!');
    }
}
