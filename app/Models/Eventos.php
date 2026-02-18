<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Eventos extends Model
{
    use HasFactory;

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

    /**
     * Relación: Un evento pertenece a un anfitrión (Usuario)
     */
    public function anfitrion(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_anfitrion');
    }
}
?>