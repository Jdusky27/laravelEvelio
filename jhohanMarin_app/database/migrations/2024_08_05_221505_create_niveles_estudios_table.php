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
        Schema::create('nivel_estudios', function (Blueprint $table) {
            $table->increments('id_nivel_estudio');
            $table->string('descripcion_nivel_estudio', 30);
            $table->enum('estado_estudio', ['Culminado', 'Cursando', 'Aplazado']);
            $table->enum('nivel_academico', ['Primaria', 'Secundaria', 'Media', 'Técnico', 'Tecnológico', 'Pregrado', 'Especialización', 'Maestría', 'Doctorado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('niveles_estudios');
    }
};
