<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVitalsTable extends Migration
{
  
    public function up()
    {
        Schema::create('vitals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vitals',100)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('vitals');
    }
}
