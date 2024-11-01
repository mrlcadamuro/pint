<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Vendedor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'vendedores'; // Nome da tabela
    protected $primaryKey = 'id_vendedor'; // Chave primária

    protected $fillable = [
        'nome',
        'email',
        'senha', // Removido telefone e data_contratacao
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
