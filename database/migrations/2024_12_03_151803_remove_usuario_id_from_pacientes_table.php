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
        Schema::table('pacientes', function (Blueprint $table) {
            // Eliminar la clave foránea primero
            $table->dropForeign(['usuario_id']);
            // Luego eliminar la columna
            $table->dropColumn('usuario_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pacientes', function (Blueprint $table) {
            // Volver a añadir la columna con la relación
            $table->foreignId('usuario_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('cascade');
        });
    }
};
