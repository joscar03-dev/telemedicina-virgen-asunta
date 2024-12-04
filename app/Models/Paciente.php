<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'direccion',
        'fecha_nacimiento',
        'sexo',
        'numero_seguro',
        'usuario_id', // Relación con usuario (opcional)
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function documentos()
    {
        return $this->hasMany(DocumentoPaciente::class, 'paciente_id');
    }

    public function historial()
    {
        return $this->hasMany(HistorialMedico::class, 'paciente_id');
    }
}
