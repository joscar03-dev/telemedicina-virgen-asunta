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
        Schema::table('citas', function (Blueprint $table) {
            // Columna para almacenar el archivo del voucher
            $table->string('voucher')->nullable(); // Para almacenar la ruta del archivo

            // Columna para almacenar la URL del link de Meet
            $table->string('meet_url')->nullable(); // Para almacenar el link de Meet
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('citas', function (Blueprint $table) {
            // Eliminar las columnas al revertir la migración
            $table->dropColumn('voucher');
            $table->dropColumn('meet_url');
        });
    }
};
