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
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id_contrato');
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->integer('horas_semanales');
            $table->float('salario_asignado');
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->enum('tipo_contrato', ['Termino Fijo', 'Indefinido']);
            $table->unsignedInteger('id_cargo');
            $table->foreign('id_cargo')->references('id_cargo')->on('cargos')->onDelete('cascade');
            $table->string('numero_identificacion_e', 10);
            $table->foreign('numero_identificacion_e')->references('numero_identificacion_e')->on('empleados')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
