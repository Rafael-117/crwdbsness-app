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
        'monto',
        'tipo',
        'status',
    ];

}
