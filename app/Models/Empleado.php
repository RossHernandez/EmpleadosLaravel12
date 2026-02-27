<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'm_empleados';
    protected $primaryKey = 'id';
    protected $fillable = ['clave_empleado', 'nombre', 'edad', 'fecha_nacimiento', 'genero', 'sueldo_base'];
}
