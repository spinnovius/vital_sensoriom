<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthTeamTable extends Migration
{
    public function up()
    {
        Schema::create('health_team', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id',false)->unsigned();
            $table->integer('coach_id',false)->unsigned();
            $table->integer('doctor_id',false)->unsigned();
            $table->integer('hospital_id',false)->unsigned();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('health_team');
    }
}
