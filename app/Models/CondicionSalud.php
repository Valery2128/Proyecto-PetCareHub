<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CondicionSalud extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id', 'id_mascota', 'tipo_condicion', 'fecha_registro', 'descripcion'
    ];
    protected $table = 'condicionessalud';


    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
