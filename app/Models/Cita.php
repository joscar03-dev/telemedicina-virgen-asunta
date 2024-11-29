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
        'disponibilidad_id',
        'fecha',
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
        return $this->belongsTo(User::class, 'paciente_id');
    }

    /**
     * Relación con la tabla Disponibilidades.
     */
    public function disponibilidad()
    {
        return $this->belongsTo(Disponibilidad::class, 'disponibilidad_id');
    }
}
