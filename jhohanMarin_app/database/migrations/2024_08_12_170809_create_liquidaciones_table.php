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
        Schema::create('liquidaciones', function (Blueprint $table) {
            $table->increments('id_liquidacion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->date('fecha_calculo')->nullable();
            $table->decimal('salud_empleado', 10, 2);
            $table->decimal('pension_empleado', 10, 2);
            $table->decimal('salud_empresa', 10, 2);
            $table->decimal('pension_empresa', 10, 2);
            $table->decimal('arl', 10, 2);
            $table->decimal('caja_compensacion', 10, 2);
            $table->integer('vacaciones')->nullable();
            $table->integer('cesantias')->nullable();
            $table->integer('intereses_cesantias')->nullable();
            $table->string('numero_identificacion_e', 10);
            $table->foreign('numero_identificacion_e')->references('numero_identificacion_e')->on('empleados')->onDelete('cascade');
            $table->decimal('total_antes_deducciones', 10, 2);
            $table->decimal('total_final', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liquidaciones');
    }
};
