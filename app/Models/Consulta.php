<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'cita_id',
        'descripcion',
        'diagnostico',
        'tratamiento',
    ];

    /**
     * Relación con la Cita.
     */
    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }

    /**
     * Relación con el Paciente a través de la Cita.
     */
    public function paciente()
    {
        return $this->hasOneThrough(Paciente::class, Cita::class);
    }

    /**
     * Relación con el Médico a través de la Cita.
     */
    public function medico()
    {
        return $this->hasOneThrough(Medico::class, Cita::class);
    }
}
