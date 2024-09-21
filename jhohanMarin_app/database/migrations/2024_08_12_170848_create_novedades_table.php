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
        Schema::create('novedades', function (Blueprint $table) {
            $table->increments('id_novedad');
            $table->string('numero_identificacion_e');
            $table->unsignedInteger('id_tipo_novedad');
            $table->date('fecha_novedad');
            $table->text('descripcion_novedad');
            $table->foreign('numero_identificacion_e')->references('numero_identificacion_e')->on('empleados')->onDelete('cascade');
            $table->foreign('id_tipo_novedad')->references('id_tipo_novedad')->on('tipo_novedads')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('novedades');
    }
};
