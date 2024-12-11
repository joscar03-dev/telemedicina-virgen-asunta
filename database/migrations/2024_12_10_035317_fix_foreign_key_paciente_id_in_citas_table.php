<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('citas', function (Blueprint $table) {
            // Eliminar el índice incorrecto, si existe
            $table->dropIndex('citas_paciente_id_foreign');

            // Agregar la clave foránea correcta
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('citas', function (Blueprint $table) {
            // Revertir los cambios: eliminar la clave foránea
            $table->dropForeign(['paciente_id']);
        });
    }
};
