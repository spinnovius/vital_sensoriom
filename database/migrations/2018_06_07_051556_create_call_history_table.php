<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallHistoryTable extends Migration
{
   
    public function up()
    {
        Schema::create('call_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id',false)->unsigned();
            $table->integer('doctor_id',false)->unsigned();
            $table->string('calling_time',64)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('call_history', function($table) {
            $table->foreign('patient_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
            $table->foreign('doctor_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('call_history');
    }
}
