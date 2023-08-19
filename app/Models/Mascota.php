<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','nombre', 'edad', 'tipo_mascota', 'rasgos_fisicos', 'tipo_alimento', 'recomendaciones_medicas'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
