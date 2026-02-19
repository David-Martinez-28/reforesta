<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Eventos extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'eventos'; // Recomendado ya que el modelo es plural

    protected $fillable = [
        'nombre',
        'descripcion',
        'ubicacion',
        'fecha',
        'tipo_terreno',
        'tipo_evento',
        'imagen',
        'id_anfitrion',
    ];


    public function anfitrion(): BelongsTo
    {
        return $this->belongsTo(Usuarios::class, 'id_anfitrion');
    }


    public function asistentes(): BelongsToMany
    {
        return $this->belongsToMany(
            Usuarios::class,
            'usuarios_eventos',
            'id_evento',
            'id_usuario'
        );
    }


    public function especies(): BelongsToMany
    {
        return $this->belongsToMany(
            Especies::class,
            'eventos_especies',
            'id_evento',
            'id_especie'
        );
    }
}