<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especies extends Model
{
    use HasFactory;

    // Nombre de la tabla si no sigue la convención plural
    protected $table = 'especies';

    protected $fillable = [
        'nombre_cientifico',
        'tiempo_para_adultez',
        'region_origen',
        'clima',
        'enlace_descripcion',
        'foto_especie',
        'beneficios',
    ];
}
?>