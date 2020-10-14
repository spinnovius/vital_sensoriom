<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientLabDetailTable extends Migration
{

    public function up()
    {
        Schema::create('patient_lab_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coach_id',false)->unsigned();
            $table->integer('patient_id',false)->unsigned();
            $table->string('test_name',64)->nullable();
            $table->string('test_date',64)->nullable();
            $table->string('value',64)->nullable();
            $table->integer('unit',false)->unsigned();
            $table->string('result',64)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('patient_lab_detail', function($table) {
            $table->foreign('coach_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
            $table->foreign('patient_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
            $table->foreign('unit', $autoIncrement = false)->unsigned()->references('id')->on('unit_for_lab_details');
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('patient_lab_detail');
    }
}
