<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistorialMedico extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'historial_medico';

    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre_ficha','vacuna','enfermedades','comentarios'];

    public function mascota() {
        return $this->hasOne(Mascota::class);
    }
}
