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
        Schema::create('cargos', function (Blueprint $table) {
            $table->increments('id_cargo');
            $table->string('nombre_cargo', 30);
            $table->text('descripcion_cargo');
            $table->enum('nivel_riesgo', ['1', '2', '3', '4', '5']);
            $table->unsignedInteger('id_nivel_grado');
            $table->foreign('id_nivel_grado')->references('id_nivel_grado')->on('nivel_grados')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargos');
    }
};
