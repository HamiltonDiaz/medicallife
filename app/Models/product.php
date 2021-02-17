<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'referencia',
        'descripcion',
        'img',
        'eliminado',
        'active',
        'line_id'
    ];
}
