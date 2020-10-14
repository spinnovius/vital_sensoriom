<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminContactTable extends Migration
{
    public function up()
    {
        Schema::create('admibn_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id',false)->unsigned();
            $table->string('contact',255)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

    }

   
    public function down()
    {
        Schema::dropIfExists('plan_description');
    }
}
