<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medicos';

    /**
     * Campos asignables masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'especialidad_id',
        'numero_colegiado',
        'biografia',
    ];

    /**
     * Relación con el modelo Usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relación con la tabla Especialidades.
     */
    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'especialidad_id');
    }

    /**
     * Relación con la tabla Citas.
     */
    public function citas()
    {
        return $this->hasMany(Cita::class, 'medico_id');
    }

    public function disponibilidades()
    {
        return $this->hasMany(Disponibilidad::class, 'medico_id');
    }
}
