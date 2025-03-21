<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('servicios', function (Blueprint $table) {
        $table->id(); // Columna autoincremental para el ID
        $table->string('nombre_servicio', 15); // Columna para el nombre del servicio
        $table->timestamps(); // Columnas created_at y updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
