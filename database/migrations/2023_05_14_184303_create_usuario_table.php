<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_usuario');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('rut_usuario',10)->unique();
            $table->string('email_usuario')->unique();
            $table->string('telefono_usuario');
            $table->string('image_usuario')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('usuario');
    }
};
