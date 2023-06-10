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
        'comentario_mascota',
        'image_mascota'
    ];

    protected $dates = ['fecha_nacimiento_mascota','deleted_at'];

    public function adopciones() {
        return $this->hasMany(Adopcion::class)->withTrashed();
    }

    public function historial_medico() {
        return $this->hasOne(HistorialMedico::class)->withTrashed();
    }

    public function raza() {
        return $this->belongsTo(Raza::class)->withTrashed();
    }

    public function tamano() {
        return $this->belongsTo(Tamano::class)->withTrashed();
    }

    public function genero_mascota() {
        return $this->belongsTo(GeneroMascota::class)->withTrashed();
    }

    public function personalidad_mascota() {
        return $this->belongsTo(PersonalidadMascota::class)->withTrashed();
    }
}
