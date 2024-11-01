<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'clientes'; // Nome da tabela
    protected $primaryKey = 'id_cliente'; // Chave primária

    protected $fillable = [
        'nome',   // Campo nome
        'email',  // Campo email
        'senha',  // Campo senha
    ];

    protected $hidden = [
        'senha', // A senha será ocultada nas respostas JSON
        'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['senha'] = bcrypt($value); // Criptografa a senha ao definir
    }
}
