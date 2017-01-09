<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Session;

class CartHelper
{
    public static function countCart()
    {
        $cart = Session::get('cart', 0);
        if($cart) {
            $cart = unserialize($cart);
            $cart = array_sum($cart);
        }
        return $cart;
    }
}