<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePixelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		//Schema::drop('pixels');
        Schema::create('pixels', function (Blueprint $table) {
            $table->increments('id');
			$table->string('url', 255);
            $table->integer('popup_trigger')->unsigned();
            $table->integer('popup_location')->unsigned();
			//$table->string('popup_trigger');
            //$table->string('popup_location');
			$table->integer('user_id')->unsigned();
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
        Schema::drop('pixels');
    }
}
