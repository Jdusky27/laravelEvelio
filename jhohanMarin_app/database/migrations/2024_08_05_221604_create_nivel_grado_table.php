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
        Schema::create('nivel_grados', function (Blueprint $table) {
            $table->increments('id_nivel_grado');
            $table->enum('tipo_nivel_grado', ['Grado', 'Nivel', 'No aplica']);
            $table->decimal('salario_minimo', 10, 2);
            $table->decimal('salario_maximo', 10, 2);
            $table->integer('min_meses_expe');
            $table->unsignedInteger('id_nivel_estudio_requerido');
            $table->foreign('id_nivel_estudio_requerido')->references('id_nivel_estudio')->on('nivel_estudios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nivel_grado');
    }
};
