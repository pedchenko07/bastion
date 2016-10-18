<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img')->default('logo.png');
            $table->string('name_shop');
            $table->string('email');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('phone3');
            $table->string('work');
            $table->string('adress');
            $table->string('company');
            $table->string('unp');
            $table->string('reestr');
            $table->string('title');
            $table->string('description');
            $table->string('keywords');
            $table->string('adsense');
            $table->string('money')->default('руб.');
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
        Schema::drop('setting');
    }
}
