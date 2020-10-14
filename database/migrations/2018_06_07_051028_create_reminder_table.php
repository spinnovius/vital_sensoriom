<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReminderTable extends Migration
{
  
    public function up()
    {
        Schema::create('reminder', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id',false)->unsigned();
            $table->integer('coach_id',false)->unsigned();
            $table->text('reminder_text')->nullable();
            $table->string('reminder_date',64)->nullable();
            $table->string('reminder_time',64)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('reminder', function($table) {
            $table->foreign('patient_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
            $table->foreign('coach_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reminder');
    }
}
