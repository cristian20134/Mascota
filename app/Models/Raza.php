<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Raza extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'raza'; // esta asociada a la tabla raza
    protected $fillable = ['raza_mascota'];

    protected $dates = ['deleted_at'];

    public function mascotas() {
        return $this->hasMany(Mascota::class);
    }



}
