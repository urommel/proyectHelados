<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('DNI')->unique();//DNI
            $table->string('apellidos');//apellidos
            $table->string('celular');//celular
            $table->date('fecha_nacimiento');//fecha de nacimiento
            $table->string('direccion');//direccion
            $table->string('foto');
            $table->unsignedBigInteger('user_id');//id del usuario
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //relacion con la tabla users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
