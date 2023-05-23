<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamano extends Model
{
    use HasFactory;

    protected $table = 'tamano';
    protected $fillable = ['tamano_mascota'];
    
    public $timestamps = false;


    public function mascotas() {
        return $this->hasMany(Mascota::class);
    }
}
