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
        Schema::table('pacientes', function (Blueprint $table) {
            // Agregar el campo 'dni' como tipo string (puede ser un varchar dependiendo del tamaño)
            $table->string('numero_documento', 15)->unique()->nullable(false)->after('id'); // El 'after' es opcional, pero coloca el campo después del 'id'
        });
    }

    public function down()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            // Eliminar el campo 'dni' si es necesario revertir la migración
            $table->dropColumn('numero_documento');
        });
    }
};
