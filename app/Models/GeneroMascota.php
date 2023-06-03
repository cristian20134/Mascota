<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneroMascota extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'genero_mascota';

    protected $fillable = ['genero_mascota'];

     protected $dates = ['deleted_at'];

    public $timestamps = false;

    public function mascotas() {
        return $this->hasMany(Mascota::class);
    }
}
