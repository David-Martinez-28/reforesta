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
    public $timestamps = true;
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
        ];
    }


    public function eventosOrganizados(): HasMany
    {
        return $this->hasMany(Eventos::class, 'id_anfitrion');
    }


    public function eventos(): BelongsToMany
    {
        return $this->belongsToMany(
            Eventos::class,
            'usuarios_eventos',
            'id_usuario',
            'id_evento'
        );
    }
}