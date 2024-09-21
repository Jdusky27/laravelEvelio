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
        Schema::create('sedes', function (Blueprint $table) {
            $table->increments('id_sede');
            $table->string('nombre_sede', 100);
            $table->string('direccion_sede', 255);
            $table->string('codigo_ciudad', 10);
            $table->string('nit', 11);
            $table->foreign('codigo_ciudad')->references('codigo_ciudad')->on('ciudades')->onDelete('cascade');
            $table->foreign('nit')->references('nit')->on('empresas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sedes');
    }
};
