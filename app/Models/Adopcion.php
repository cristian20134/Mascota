<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adopcion extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['fecha_adopcion','deleted_at'];

    public function seguimiento() {
        return $this->belongsTo(Seguimiento::class,'seguimiento_id','id');
    }

    public function usuario() {
        return $this->hasMany(Usuario::class);
    }

    public function mascotas() {
        return $this->hasMany(Mascota::class);
    }
}