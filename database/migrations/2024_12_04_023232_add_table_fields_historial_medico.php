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
        Schema::table('historial_medicos', function (Blueprint $table) {
            $table->string('tipo_registro')->nullable();
            $table->foreignId('medico_id')->nullable()->constrained('medicos')->onDelete('set null');
            $table->string('ruta_archivo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_medicos');
    }
};
