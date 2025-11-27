<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposEvaluacion extends Model
{
    use HasFactory;

    protected $table = 'tipos_evaluacion';

    protected $fillable = [
        'plan_de_estudios',
        'tipo_evaluacion',
        'descripcion_evaluacion',
        'descripcion_corta_evaluacion',
        'calif_minima_aprobatoria',
        'evaluacion_depende',
        'usocurso',
        'nosegundas',
        'orden',
        'prioridad',
    ];
}
