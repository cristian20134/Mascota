<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seguimiento extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['fecha_seguimiento','deleted_at'];

    public function adopciones() {
        return $this->hasMany(Adopcion::class, 'Seguimiento_id','id');
    }
}
