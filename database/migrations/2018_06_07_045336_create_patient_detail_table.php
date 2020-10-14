<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientDetailTable extends Migration
{
    public function up()
    {
        Schema::create('patient_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id',false)->unsigned();
            $table->string('gender',64)->nullable();
            $table->string('dob',64)->nullable();
            $table->string('marital_status',64)->nullable();
            $table->integer('city',false)->unsigned();
            $table->string('height',64)->nullable();
            $table->string('weight',64)->nullable();
            $table->string('bmi',64)->nullable();
            $table->string('blood_group',64)->nullable();
            $table->text('profile_pic')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('patient_detail', function($table) {
            $table->foreign('patient_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
            $table->foreign('city', $autoIncrement = false)->unsigned()->references('id')->on('city');
        });
    }

    public function down()
    {
        Schema::dropIfExists('patient_detail');
    }
}
