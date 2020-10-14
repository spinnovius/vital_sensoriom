<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientWalletDetailTable extends Migration
{
 
    public function up()
    {
        Schema::create('patient_wallet_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id',false)->unsigned();
            $table->string('credit_amount',64)->nullable();
            $table->string('debit_amount',64)->nullable();
            $table->string('total_amount',64)->nullable();
            $table->string('amount_description',255)->nullable();
            $table->boolean('in_wallet')->default(1);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('patient_wallet_detail', function($table) {
            $table->foreign('patient_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('patient_wallet_detail');
    }
}
