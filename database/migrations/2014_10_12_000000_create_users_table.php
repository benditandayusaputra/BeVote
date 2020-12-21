<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('nis');
            $table->string('name');
            $table->enum('gender', ['Laki-Laki', 'Perempuan']);
            $table->string('class')->nullable();
            $table->enum('user_type', ['SISWA', 'GURU', 'STAF']);
            $table->string('token');
            $table->enum('status_choice', [0, 1]);
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
        Schema::dropIfExists('users');
    }
}
