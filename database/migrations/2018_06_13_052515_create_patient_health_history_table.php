<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientHealthHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('patient_health_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('problem_id',100)->nullable();
            $table->integer('patient_id',false)->unsigned();
            $table->string('smoking',100)->nullable();
            $table->string('alcohol_drinking',100)->nullable();
            $table->test('allergies')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('patient_health_history', function($table) {
            $table->foreign('patient_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('patient_health_history');
    }
}
