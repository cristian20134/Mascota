<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalidadMascota extends Model
{
    use HasFactory;

    protected $table = 'personalidad_mascota';
    protected $fillable = ['personalidad_mascota'];
    public $timestamps = false;

    public function mascotas() {
        return $this->hasMany(Mascota::class);
    }
}
