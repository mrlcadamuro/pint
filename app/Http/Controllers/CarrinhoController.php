<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\ItemVenda;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function index()
    {
        // Obtém o ID do usuário autenticado
        $idUsuario = Auth::id();

        // Busca a venda associada ao usuário
        $venda = Venda::where('id_usuario', $idUsuario)->first(); // Corrigido para usar 'id_usuario'

        // Se não houver venda correspondente, exibe a view 'home.carrinho' com mensagem de carrinho vazio
        if (!$venda) {
            return view('carrinho.index', ['itens' => [], 'mensagem' => 'Seu carrinho está vazio.']);
        }

        // Recupera os itens da venda
        $itens = ItemVenda::with('produto')->where('id_venda', $venda->id_venda)->get();

        // Retorna a view 'home.carrinho' passando a lista de itens encontrados no 
        return view('carrinho.index', compact('itens'));
    }

    public function update(Request $request, ItemVenda $item)
    {
        // Valida a quantidade fornecida
        $request->validate([
            'quantidade' => 'required|integer|min:1',
        ]);

        // Atualiza a quantidade do item no carrinho
        $item->update([
            'quantidade' => $request->quantidade,
        ]);

        return redirect()->route('carrinho.index')->with('mensagem', 'Quantidade atualizada com sucesso.');
    }

    public function destroy(ItemVenda $item)
    {
        // Remove o item do carrinho
        $item->delete();
        
        return redirect()->route('carrinho.index')->with('mensagem', 'Produto removido do carrinho.');
    }
}
