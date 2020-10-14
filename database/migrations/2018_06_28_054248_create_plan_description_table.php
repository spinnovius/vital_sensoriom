<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanDescriptionTable extends Migration
{
    public function up()
    {
        Schema::create('plan_description', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plan_id',false)->unsigned();
            $table->string('descripption',255)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('plan_description', function($table) {
            $table->foreign('plan_id', $autoIncrement = false)->unsigned()->references('id')->on('master_health_plan');
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('plan_description');
    }
}
