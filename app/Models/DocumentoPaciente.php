<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoPaciente extends Model
{
    use HasFactory;
    protected $fillable = [
        'paciente_id',
        'nombre_documento',
        'tipo_documento'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
