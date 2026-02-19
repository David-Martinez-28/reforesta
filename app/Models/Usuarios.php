<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Usuarios extends Authenticatable
{
    use HasFactory, Notifiable;
    public $timestamps = false;
    protected $table = "usuarios"; 

    protected $fillable = [
        'nombre', 
        'nick', 
        'email', 
        'password', 
        'ubicacion',
        'karma',
        'avatar',
        'tipo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'karma' => 'integer',
        ];
    }

    
    public function eventosOrganizados(): HasMany
    {
        return $this->hasMany(Eventos::class, 'id_anfitrion');
    }

    
    public function eventosAsistidos(): BelongsToMany
    {
        return $this->belongsToMany(
            Eventos::class,      // Modelo relacionado
            'usuarios_eventos',  // Tabla pivote
            'id_usuario',        // FK de este modelo en la pivote
            'id_evento'          // FK del modelo relacionado en la pivote
        );
    }
}