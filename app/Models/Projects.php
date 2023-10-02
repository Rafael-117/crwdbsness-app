<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $fillable = [
      'companie_id',
      'user_id',
      'nombre',
      'descripcion',
      'estado',
      'responsables',
      'valor_inicial',
      'valor_final',
      'valor_actual',
      'meta',
      'meta_minima',
      'riesgo',
      'rendimiento',
      'acciones',
      'acciones_disponibles',
      'pagos',
      'periodo_pago',
      'oferta_accionaria',
      'monto_financiamiento',
      'impuestos',
      'informacion_proyecto',
      'campaña_comercial',
      'capitalizacion',
      'evaluacion_financiera',
      'logo_url',
      'portada_url',
      'ubicacion',
      'adjuntos',
      'status',
    ];
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'project_id');
    }
}
