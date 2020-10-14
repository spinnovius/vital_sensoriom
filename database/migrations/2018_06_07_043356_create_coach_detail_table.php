<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoachDetailTable extends Migration
{
    public function up()
    {
        Schema::create('coach_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coach_id',false)->unsigned();
            $table->integer('city',false)->unsigned();
            $table->string('qualification',100)->nullable();
            $table->string('registration_number',64)->nullable();
            $table->integer('authority_council_id',false)->unsigned()->nullable();
            $table->text('profile_pic')->nullable();
            $table->text('document')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('coach_detail', function($table) {
            $table->foreign('coach_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
            $table->foreign('city', $autoIncrement = false)->unsigned()->references('id')->on('city');
            $table->foreign('authority_council_id', $autoIncrement = false)->unsigned()->references('id')->on('authority_council');
        });
    }

    public function down()
    {
        Schema::dropIfExists('coach_detail');
    }
}
