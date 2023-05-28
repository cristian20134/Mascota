<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seguimiento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'seguimiento';

    protected $fillable = [
        'adopcion_id',
        'estado_mascota',
        'fecha_seguimiento',
        'descripcion_seguimiento'      
    ];

    protected $dates = ['fecha_seguimiento','deleted_at'];

    public function adopcion() {
        return $this->belongsTo(Adopcion::class);
    }
}
