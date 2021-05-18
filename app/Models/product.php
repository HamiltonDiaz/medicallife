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

    //Query Scope
    public function scopeProduct($query, $name){
        if($name){
            return $query->where("nombre","LIKE","%$name%");
        }
    }
}
