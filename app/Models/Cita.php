<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'citas';

    /**
     * Campos asignables masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'medico_id',
        'paciente_id',
        'fecha',
        'tipo_cita',
        'hora_inicio',
        'hora_fin',
        'estado',
        'observaciones',
    ];

    /**
     * Relación con el modelo Medico.
     */
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }

    /**
     * Relación con el modelo Usuario (Paciente).
     */

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }


    /**
     * Relación con la tabla Disponibilidades.
     */
    public function disponibilidad()
    {
        return $this->belongsTo(Disponibilidad::class, 'disponibilidad_id');
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'cita_id');
    }
}
