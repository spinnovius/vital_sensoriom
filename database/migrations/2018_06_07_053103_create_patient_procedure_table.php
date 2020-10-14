<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientProcedureTable extends Migration
{
 
    public function up()
    {
        Schema::create('patient_procedure', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coach_id',false)->unsigned();
            $table->integer('patient_id',false)->unsigned();
            $table->string('procedure_name',100)->nullable();
            $table->string('procedure_date',64)->nullable();
            $table->string('remark',100)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();   
        });

        Schema::table('patient_procedure', function($table) {
            $table->foreign('coach_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
            $table->foreign('patient_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('patient_procedure');
    }
}
