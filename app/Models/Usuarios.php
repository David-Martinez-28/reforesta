<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UsuariosFactory> */
    use HasFactory, Notifiable;

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

    public function usuarios(){
        return $this->hasMany(Usuarios::class);
    }
}
