<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oses', function (Blueprint $table) {
            $table->id();
            $table->string('chairman_name', 225);
            $table->string('vice_chairman_name', 255);
            $table->string('moto', 100);
            $table->text('mission');
            $table->text('vision');
            $table->text('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oses');
    }
}
