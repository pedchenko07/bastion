<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';

    protected $fillable = ['name', 'price', 'keywords', 'country', 'goods_brandid', 'anons','content', 'new','hits','sale',
    'no_goods', 'visible'];
}
