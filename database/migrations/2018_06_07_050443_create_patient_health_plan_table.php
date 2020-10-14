<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientHealthPlanTable extends Migration
{
  
    public function up()
    {
        Schema::create('patient_health_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id',false)->unsigned();
            $table->integer('plan_id',false)->unsigned();
            $table->integer('in_pay')->default(0);
            $table->string('payment_date')nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('patient_health_plan', function($table) {
            $table->foreign('patient_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
            $table->foreign('plan_id', $autoIncrement = false)->unsigned()->references('id')->on('master_health_plan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('patient_helth_plan');
    }
}
