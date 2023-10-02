<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;

    protected $fillable = [
            'user_id',
            'nombre',
            'razon',
            'rfc',
            'descripcion',
            'encargado',
            'web',
            'sector',
            'calle',
            'numero',
            'colonia',
            'ciudad',
            'estado',
            'pais',
            'logo_url',
            'status',
    ];
    public function sector()
    {
        return $this->belongsTo(Sectors::class, 'sector');
    }
}
