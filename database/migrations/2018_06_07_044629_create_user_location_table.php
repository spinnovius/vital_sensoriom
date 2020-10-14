<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLocationTable extends Migration
{
  
    public function up()
    {
        Schema::create('user_location', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id',false)->unsigned();
            $table->string('lat',64)->nullable();
            $table->string('long',64)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('user_location', function($table) {
            $table->foreign('user_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('user_location');
    }
}
