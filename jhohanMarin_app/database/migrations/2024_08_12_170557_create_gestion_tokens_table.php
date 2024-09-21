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
        Schema::create('gestion_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario');
            $table->string('token', 255);
            $table->timestamp('creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('expiracion')->nullable();
            $table->boolean('used')->default(false);
            $table->foreign('usuario')->references('numero_identificacion_e')->on('empleados')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestion_tokens');
    }
};
