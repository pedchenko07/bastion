<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('keywords');
            $table->string('country');
            $table->string('img')->default('no_image.jpg');
            $table->tinyInteger('goods_brandid')->unsigned();
            $table->text('anons');
            $table->text('content');
            $table->enum('visible', [0,1])->default(1);
            $table->enum('hits', [0,1])->default(0);
            $table->enum('new', [0,1])->default(0);
            $table->enum('sale', [0,1])->default(0);
            $table->enum('no_goods', [0,1])->default(0);
            $table->float('price')->default(0);
            $table->date('date');
            $table->string('img_slide')->nullable()->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('goods');
    }
}
