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

    // Si decides usar la relación con el usuario, puedes agregar este método
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
