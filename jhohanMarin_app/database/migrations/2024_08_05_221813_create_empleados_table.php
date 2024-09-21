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
        Schema::create('empleados', function (Blueprint $table) {
            $table->string('numero_identificacion_e', 10)->primary();
            $table->string('primer_nombre', 30);
            $table->string('segundo_nombre', 30)->nullable();
            $table->string('primer_apellido', 30);
            $table->string('segundo_apellido', 30)->nullable();
            $table->enum('estado_civil', ['Soltero', 'Casado', 'Divorciado', 'Viudo', 'No indica']);
            $table->enum('tipo_documento', ['Cédula', 'Pasaporte', 'Tarjeta de Identidad', 'Cédula de extranjería']);
            $table->string('correo', 100)->unique();
            $table->string('celular', 10)->unique();
            $table->enum('genero', ['Masculino', 'Femenino', 'Otro']);
            $table->date('fecha_nacimiento');
            $table->date('fecha_exp_documento');
            $table->string('direccion', 50);
            $table->string('numero_cuenta_bancaria', 20);
            $table->string('banco', 30);
            $table->string('nit', 11)->nullable();
            $table->unsignedInteger('id_nivel_estudio');
            $table->foreign('id_nivel_estudio')->references('id_nivel_estudio')->on('nivel_estudios')->onDelete('cascade');
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
