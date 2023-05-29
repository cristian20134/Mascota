<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mascota extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mascota';

    protected $fillable = [
        'historial_medico_id',
        'raza_id',
        'tamano_id',
        'genero_mascota_id',
        'personalidad_mascota_id',
        'nombre_mascota',
        'fecha_nacimiento_mascota',
        'comentario_mascota'
    ];

    protected $dates = ['fecha_nacimiento_mascota','deleted_at'];

    public function adopciones() {
        return $this->hasMany(Adopcion::class);
    }

    public function historial_medico() {
        return $this->hasOne(HistorialMedico::class);
    }

    public function raza() {
        return $this->belongsTo(Raza::class);
    }

    public function tamano() {
        return $this->belongsTo(Tamano::class);
    }

    public function genero_mascota() {
        return $this->belongsTo(GeneroMascota::class);
    }

    public function personalidad_mascota() {
        return $this->belongsTo(PersonalidadMascota::class);
    }
}
