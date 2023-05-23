<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneroMascota extends Model
{
    use HasFactory;

    protected $table = 'genero_mascota';
    protected $fillable = ['genero_mascota'];
    public $timestamps = false;

    public function mascotas() {
        return $this->hasMany(Mascota::class);
    }
}
