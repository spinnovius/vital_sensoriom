<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterHealthPlanTable extends Migration
{
   
    public function up()
    {
        Schema::create('master_health_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plan_name',64)->nullable();
            $table->string('price',64)->nullable();
            $table->integer('doctor',false)->unsigned();
            $table->integer('appointment',false)->unsigned();
            $table->string('one_line_description',255)->nullable();
            $table->string('special_workup',255)->nullable();
            $table->string('duration',100)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('master_health_plan');
    }
}
