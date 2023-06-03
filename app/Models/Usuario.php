<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'usuario';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre_usuario',
        'apellido_paterno',
        'apellido_materno',
        'rut_usuario',
        'email_usuario',
        'telefono_usuario',
    ];

    public function adopciones() {
        return $this->hasMany(Adopcion::class);
    }
}
