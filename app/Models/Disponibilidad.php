<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disponibilidad extends Model
{
    use HasFactory;

    protected $table = 'disponibilidades';

    /**
     * Campos asignables masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'medico_id',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'disponible',
    ];

    /**
     * Relación con el modelo Medico.
     */
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }
}
