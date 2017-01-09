<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function zakazTovar()
    {
        return $this->hasMany('App\Models\ZakazTovar', 'orders_id', 'id');
    }

    public function dostavka()
    {
        return $this->belongsTo('App\Models\Dostavkas');
    }

    public function oplata()
    {
        return $this->belongsTo('App\Models\Oplata');
    }

    public static function switchStatus($id)
    {
        if($order = self::find($id)){
            $order->status = 1;
            return $order->update();
        }
        return false;
    }

    public static function countNotAcepticOrders()
    {
        return self::where('status', '=', 0)->count();
    }

    public static function newOrder()
    {
        return self::where('status', 0)->get();
    }
}
