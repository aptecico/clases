<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajadores extends Model
{
    
    use HasFactory;
    protected $fillable=['nombre','apellido','correo','telefono','direcion','id_departamento'];
}
