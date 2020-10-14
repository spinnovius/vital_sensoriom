<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabreportTable extends Migration
{
    public function up()
    {
        Schema::create('lab_report', function (Blueprint $table) {
            $table->increments('id');
            $table->string('test_name',255)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

    }

   
    public function down()
    {
        Schema::dropIfExists('lab_report');
    }
}
