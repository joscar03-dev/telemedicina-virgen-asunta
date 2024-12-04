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
        Schema::table('documento_pacientes', function (Blueprint $table) {
            $table->string('ruta_archivo')->nullable(); // Ruta del archivo almacenado
            $table->timestamp('fecha_subida')->default(now()); // Fecha de subida
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documento_pacientes', function (Blueprint $table) {
            $table->dropColumn('ruta_archivo');
            $table->dropColumn('fecha_subida');
        });
    }
};
