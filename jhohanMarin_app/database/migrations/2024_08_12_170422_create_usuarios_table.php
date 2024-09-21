<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario');
            $table->integer('intentos')->default(0);
            $table->boolean('estado_u')->default(false);
            $table->string('contrasena', 88);
            $table->enum('id_rol', ['Admin', 'Contador', 'Auxiliar Contable', 'RRHH', 'Empleado General']);
            $table->foreign('usuario')->references('numero_identificacion_e')->on('empleados')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
