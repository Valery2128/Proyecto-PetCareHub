<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcedimientoVeterinario extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id', 'id_mascota', 'tipo_procedimiento', 'fecha_procedimiento', 'resultado', 'imagen_url'
    ];
    protected $table = 'procedimientosveterinarios';


    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
