<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adopcion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'adopcion';

    protected $fillable = [
        'usuario_id',
        'mascota_id',
        'nombre_cuidad',
        'direccion_adopcion',
        'fecha_adopcion',
        'descripcion_adopcion'      
    ];

    protected $dates = ['fecha_adopcion','deleted_at'];

    public function seguimientos() {
        return $this->hasMany(Seguimiento::class)->withTrashed();
    }

    public function usuario() {
        return $this->belongsTo(Usuario::class)->withTrashed();
    }

    public function mascota() {
        return $this->belongsTo(Mascota::class)->withTrashed();
    }
}
