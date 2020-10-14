<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientPriscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_priscription', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id',false)->unsigned();
            $table->integer('doctor_id',false)->unsigned();
            $table->string('medicine_name',100)->nullable();
            $table->string('dose',100)->nullable();
            $table->string('freq',100)->nullable();
            $table->string('route',100)->nullable();
            $table->string('duration',100)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('patient_priscription', function($table) {
            $table->foreign('patient_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
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
        Schema::dropIfExists('patient_priscription');
    }
}
