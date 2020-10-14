<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id',false)->unsigned();
            $table->integer('speciality',false)->unsigned();
            $table->integer('city',false)->unsigned();
            $table->string('fee_of_consultation',64)->nullable();
            $table->string('mbbs_registration_number',64)->nullable();
            $table->integer('mbbs_authority_council_name',false)->unsigned()->nullable();
            $table->string('md_ms_dnb_registration_number',64)->nullable();
            $table->integer('md_ms_dnb_authority_council_name',false)->unsigned()->nullable();
            $table->string('dm_mch_dnb_registration_number',64)->nullable();
            $table->integer('dm_mch_dnb_authority_council_name',false)->unsigned()->nullable();
            $table->text('profile_pic')->nullable();
            $table->text('document')->nullable();
            $table->boolean('available')->default(1);
            $table->boolean('call_payment')->default(1);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::table('doctors', function($table) {
            $table->foreign('doctor_id', $autoIncrement = false)->unsigned()->references('id')->on('users');
            $table->foreign('speciality', $autoIncrement = false)->unsigned()->references('id')->on('doctor_speciality');
            $table->foreign('city', $autoIncrement = false)->unsigned()->references('id')->on('city');
            $table->foreign('mbbs_authority_council_name', $autoIncrement = false)->unsigned()->references('id')->on('authority_council');
            $table->foreign('md_ms_dnb_authority_council_name', $autoIncrement = false)->unsigned()->references('id')->on('authority_council');
            $table->foreign('dm_mch_dnb_authority_council_name', $autoIncrement = false)->unsigned()->references('id')->on('authority_council');
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
