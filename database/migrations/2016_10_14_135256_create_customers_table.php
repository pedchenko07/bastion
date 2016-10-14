<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default(null)->nullable();
            $table->string('email')->default(null)->nullable();
            $table->integer('phone')->default(0);
            $table->string('city')->default(null)->nullable();
            $table->string('adres')->default(null)->nullable();
            $table->string('comment')->default(null)->nullable();
            $table->tinyInteger('payment_type')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
