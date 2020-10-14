<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsBankDetailTable extends Migration
{
    public function up()
    {
        Schema::create('doctors_bank_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id',false)->unsigned();
            $table->string('bank_name',100)->nullable();
            $table->string('account_number',100)->nullable();
            $table->string('ifsc_code',100)->nullable();
            $table->string('beneficiary_name',100)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('doctors_bank_detail', function($table) {
            $table->foreign('doctor_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
        });

    }

    public function down()
    {
        Schema::dropIfExists('doctors_bank_detail');
    }
}
