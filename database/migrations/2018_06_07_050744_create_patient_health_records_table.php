<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientHealthRecordsTable extends Migration
{
   
    public function up()
    {
        Schema::create('patient_health_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id',false)->unsigned();
            $table->string('add_date',64)->nullable();
            $table->string('blood_pressure_min_value',64)->nullable();
            $table->string('blood_pressure_max_value',64)->nullable();
            $table->string('pluse',64)->nullable();
            $table->string('temperature',64)->nullable();
            $table->string('oxygen_saturation',64)->nullable();
            $table->string('breathing_rate',64)->nullable();
            $table->string('abdominal_circumference',64)->nullable();
            $table->string('blood_sugar',64)->nullable();
            $table->string('weight',64)->nullable();
            $table->string('height',64)->nullable();
            $table->string('bmi',64)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('patient_health_records', function($table) {
            $table->foreign('patient_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('patient_helth_records');
    }
}
