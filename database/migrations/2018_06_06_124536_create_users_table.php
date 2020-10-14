<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname',64)->nullable();
            $table->string('lname',64)->nullable();
            $table->string('email',64)->nullable();
            $table->string('contact_number',64)->unique();
            $table->string('password');
            $table->integer('role_id',false)->unsigned();
            $table->string('device_id',255)->nullable();
            $table->boolean('verified')->default(0);
            $table->boolean('view')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('users', function($table) {
            $table->foreign('role_id', $autoIncrement = false)->unsigned()->references('id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
