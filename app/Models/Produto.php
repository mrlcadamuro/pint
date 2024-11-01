<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table ='produtos';
    protected $primaryKey ='id_produto';
    
    protected $fillable =[
        'nome', 
        'descricao', 
        'preco', 
        'estoque',
        'image'
    ];

    public function produto()
    {
        return $this->hasMany(ItemVenda::class, 'id_produto', 'id_produto');
    }
}
