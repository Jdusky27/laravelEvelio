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
        Schema::create('vacaciones_cesantias', function (Blueprint $table) {
            $table->string('numero_identificacion_e');
            $table->decimal('vacaciones_acumulado', 10, 2)->nullable();
            $table->decimal('cesantias_acumuladas', 10, 2)->nullable();
            $table->decimal('intereses_cesantias', 10, 2)->nullable();
            $table->integer('antiguedad')->nullable();
            $table->integer('dias_vacaciones')->nullable();
            $table->foreign('numero_identificacion_e')->references('numero_identificacion_e')->on('empleados')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacaciones_cesantias');
    }
};
