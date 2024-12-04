<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recetas extends Model
{
    use HasFactory;

    protected $table = 'recetas';

    protected $fillable = [
        'consulta_id',
        'detalles',
    ];

    public function consulta()
    {
        return $this->belongsTo(Consulta::class);
    }
}
