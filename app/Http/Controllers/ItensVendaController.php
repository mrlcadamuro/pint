<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemVenda;
use App\Models\Venda;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;


class ItemVendaController extends Controller
{
    public function index($id_venda)
    {
        $itensVenda = ItemVenda::where('id_venda', $id_venda)->with('produto')->get();
        return view('itens_venda.index', compact('itensVenda', 'id_venda'));
    }


    public function create($id_venda)
    {
        // Lista todos os produtos disponíveis para adição a venda
        $produtos = Produto::all();
        return view('itens_venda.create', compact('produtos', 'id_venda'));
    }

    public function store(Request $request, $id_venda)
    {
        // Validação dos dados do formulário
        $request->validate([
            'id_produto' => 'required|exists:produtos,id_produto',
            'quantidade' => 'required|integer|min:1',
        ]);

        // Cria um novo item de venda
        $produto = Produto::findOrFail($request->id_produto);

        $itemVenda = new ItemVenda();
        $itemVenda->id_venda = $id_venda;
        $itemVenda->id_produto = $request->id_produto;
        $itemVenda->quantidade = $request->quantidade;
        $itemVenda->preco_unitario = $produto->preco;
        $itemVenda->save();

        // Redireciona de volta à lista de itens da venda com mensagem de sucesso
        return redirect()->route('itens_venda.index', $id_venda)->with('msg', 'Item adicionado com sucesso!');
    }

    public function edit($id_venda, $id_item_venda)
    {
        // Busca o item de venda para edição
        $itemVenda = ItemVenda::where('id_venda', $id_venda)->where('id_item_venda', $id_item_venda)->firstOrFail();
        $produtos = Produto::all();
        
        return view('itens_venda.edit', compact('itemVenda', 'produtos', 'id_venda'));
    }

    public function update(Request $request, $id_venda, $id_item_venda)
    {
        // Validação dos dados do formulário
        $request->validate([
            'id_produto' => 'required|exists:produtos,id_produto',
            'quantidade' => 'required|integer|min:1',
        ]);

        // Atualiza os dados do item de venda
        $itemVenda = ItemVenda::where('id_venda', $id_venda)->where('id_item_venda', $id_item_venda)->firstOrFail();
        $produto = Produto::findOrFail($request->id_produto);

        $itemVenda->id_produto = $request->id_produto;
        $itemVenda->quantidade = $request->quantidade;
        $itemVenda->preco_unitario = $produto->preco;
        $itemVenda->save();

        // Redireciona de volta à lista de itens da venda com mensagem de sucesso
        return redirect()->route('itens_venda.index', $id_venda)->with('msg', 'Item atualizado com sucesso!');
    }

    public function destroy($id_venda, $id_item_venda)
    {
        try {
            // Exclui o item de venda
            $itemVenda = ItemVenda::where('id_venda', $id_venda)->where('id_item_venda', $id_item_venda)->firstOrFail();
            $itemVenda->delete();
            return redirect()->route('itens_venda.index', $id_venda)->with('msg', 'Item excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('itens_venda.index', $id_venda)->with('msg', 'Erro ao excluir item.');
        }
    }
}
