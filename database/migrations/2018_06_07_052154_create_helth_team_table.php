<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelthTeamTable extends Migration
{
    public function up()
    {
        Schema::create('helth_team', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id',false)->unsigned();
            $table->integer('coach_id',false)->unsigned();
            $table->integer('doctor_id',false)->unsigned();
            $table->integer('hospital_id',false)->unsigned();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('helth_team', function($table) {
            $table->foreign('patient_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
            $table->foreign('coach_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
            $table->foreign('doctor_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
            $table->foreign('hospital_id', $autoIncrement = false)->unsigned()->references('id')->on('hospital');
        });
    }

    public function down()
    {
        Schema::dropIfExists('helth_team');
    }
}
