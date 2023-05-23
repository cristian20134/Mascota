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
        Schema::create('seguimiento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('adopcion_id');
            $table->foreign('adopcion_id')->references('id')->on('adopcion');
            $table->string('estado_mascota');
            $table->dateTime('fecha_seguimiento');
            $table->text('descripcion_seguimiento');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento');
    }
};
