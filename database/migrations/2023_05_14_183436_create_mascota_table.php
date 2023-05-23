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
        Schema::create('mascota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('historial_medico_id');
            $table->foreign('historial_medico_id')->references('id')->on('historial_medico');
            $table->unsignedBigInteger('raza_id');
            $table->foreign('raza_id')->references('id')->on('raza');
            $table->unsignedBigInteger('tamano_id');
            $table->foreign('tamano_id')->references('id')->on('tamano');
            $table->unsignedBigInteger('genero_mascota_id');
            $table->foreign('genero_mascota_id')->references('id')->on('genero_mascota');
            $table->unsignedBigInteger('personalidad_mascota_id');
            $table->foreign('personalidad_mascota_id')->references('id')->on('personalidad_mascota');
            $table->string('nombre_mascota');
            $table->dateTime('fecha_nacimiento_mascota');
            $table->text('comentario_mascota');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascota');
    }
};
