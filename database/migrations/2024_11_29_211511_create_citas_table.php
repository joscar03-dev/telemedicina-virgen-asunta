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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medico_id'); // Clave foránea a Medicos
            $table->unsignedBigInteger('paciente_id'); // Clave foránea a Usuarios (rol Paciente)
            $table->date('fecha'); // Fecha de la cita
            $table->time('hora_inicio'); // Hora de inicio de la cita
            $table->time('hora_fin'); // Hora de fin estimado
            $table->string('estado')->default('pendiente'); // Estado de la cita
            $table->text('observaciones')->nullable(); // Observaciones adicionales
            $table->timestamps();

            // Claves foráneas
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
            $table->foreign('paciente_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
