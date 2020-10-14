<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientFamilyContactTable extends Migration
{

    public function up()
    {
        Schema::create('patient_family_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id',false)->unsigned();
            $table->string('member_name',64)->nullable();
            $table->string('relation',64)->nullable();
            $table->string('contact_number',64)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('patient_family_contact', function($table) {
            $table->foreign('patient_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('patient_family_contact');
    }
}
