<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsBalanceTable extends Migration
{
   
    public function up()
    {
        Schema::create('doctors_balance', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id',false)->unsigned();
            $table->integer('patient_id',false)->unsigned();
            $table->string('online_amount',100)->nullable();
            $table->string('offline_amount',100)->nullable();
            $table->string('total_amount',100)->nullable();
            $table->string('amount_description',255)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('doctors_balance', function($table) {
            $table->foreign('doctor_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors_balance');
    }
}
