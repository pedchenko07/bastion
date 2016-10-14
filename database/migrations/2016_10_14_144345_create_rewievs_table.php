<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewievsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewievs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default(null)->nullable();
            $table->string('email')->default(null)->nullable();
            $table->text('text')->default(null)->nullable();
            $table->integer('product_id')->default(0);
            $table->date('date')->default(null);
            $table->tinyInteger('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rewievs');
    }
}
