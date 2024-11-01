<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $table = 'vendas';
    protected $primaryKey = 'id_venda';          

    protected $fillable = [
        'id_usuario', // Substitua 'id_cliente' por 'id_usuario'
        'id_vendedor',
        'data_venda',
        'total_venda',
    ];

    protected $casts = [
        'data_venda' => 'datetime',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'id_vendedor', 'id_vendedor');
    }

    public function itens()
    {
        return $this->hasMany(ItemVenda::class, 'id_venda', 'id_venda');
    }
}
