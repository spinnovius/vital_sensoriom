<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationTable extends Migration
{
  
    public function up()
    {
        Schema::create('notification', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from_id',false)->nullable();
            $table->integer('to_id',false)->nullable();
            $table->text('notification_description')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        // Schema::table('notification', function($table) {
        //     $table->foreign('patient_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
        //     $table->foreign('coach_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
        // });
    }

    
    public function down()
    {
        Schema::dropIfExists('notification');
    }
}
