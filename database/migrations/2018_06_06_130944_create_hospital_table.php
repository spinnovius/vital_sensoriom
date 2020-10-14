<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalTable extends Migration
{
    
    public function up()
    {
        Schema::create('hospital', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->nullable();
            $table->string('email',64)->nullable();
            $table->integer('city',false)->unsigned();
            $table->string('contact_number',64)->nullable();
            $table->text('address')->nullable();
            $table->string('urgent_care_number',64)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('hospital', function($table) {
            $table->foreign('city', $autoIncrement = false)->unsigned()->references('id')->on('city');
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('hospital');
    }
}
