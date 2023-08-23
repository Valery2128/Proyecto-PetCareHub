<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicadorSalud extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id', 'id_mascota', 'tipo_indicador', 'fecha_registro', 'valor'
    ];
    protected $table = 'indicadoressalud';


    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
