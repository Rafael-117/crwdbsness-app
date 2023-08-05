<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $fillable = [
        'companie_id',
        'nombre',
        'descripcion',
        'estado',
        'responsables',
        'valor_inicial',
        'valor_final',
        'valor_actual',
        'meta',
        'riesgo',
        'rendimiento',
        'acciones',
        'pagos',
        'periodo_pago',
        'informacion_proyecto',
        'campaña_comercial',
        'capitalizacion',
        'evaluacion_financiera',
        'logo_url',
        'portada_url',
        'ubicacion',
        'editable',
        'status',
    ];
}
