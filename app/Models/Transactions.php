<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'user_id',
        'num_acciones',
        'precio_acccion',
        'monto',
        'comision',
        'impuestos',
        'total',
        'tipo',
        'status'
    ];
    public function project()
    {
        return $this->belongsTo(Projects::class, 'project_id');
    }
}
