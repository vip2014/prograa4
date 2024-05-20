<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaestrosTable extends Migration
{
    public function up()
    {
        Schema::create('maestros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('profesion');
            $table->integer('edad');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('maestros');
    }
}
