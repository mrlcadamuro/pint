<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Vendedor;
use App\Models\Produto;
use App\Models\ItemVenda;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    public function index()
    {
        $vendas = Venda::with(['cliente', 'vendedor', 'itemVenda.produto'])->get();
        return view('vendas.index', compact('vendas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $vendedores = Vendedor::all();
        $produtos = Produto::all();

        return view('vendas.create', compact('clientes', 'vendedores', 'produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_vendedor' => 'required|exists:vendedores,id_vendedor',
            'data_venda' => 'required|date',
            'itens.*.id_produto' => 'required|exists:produtos,id_produto',
            'itens.*.quantidade' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $venda = Venda::create([
                'id_cliente' => $request->id_cliente,
                'id_vendedor' => $request->id_vendedor,
                'data_venda' => $request->data_venda,
                'total_venda' => 0, 
            ]);

            $totalVenda = 0;

            foreach ($request->itens as $item) {
                $produto = Produto::findOrFail($item['id_produto']);
                $itemVenda = new ItemVenda();
                $itemVenda->id_venda = $venda->id_venda;
                $itemVenda->id_produto = $produto->id_produto;
                $itemVenda->quantidade = $item['quantidade'];
                $itemVenda->preco_unitario = $produto->preco;
                $itemVenda->subtotal = $produto->preco * $item['quantidade']; 
                $itemVenda->save();
                
                $totalVenda += $itemVenda->subtotal; 
            }

            // Atualizar o valor total da venda
            $venda->total_venda = $totalVenda;
            $venda->save();
        });

        return redirect()->route('vendas.index')->with('msg', 'Venda cadastrada com sucesso!');
    }


    public function show($id_venda)
    {
        $venda = Venda::with(['cliente', 'vendedor', 'itensVenda.produto'])->findOrFail($id_venda);
        return view('vendas.show', compact('venda'));
    }

    public function edit($id_venda)
    {
        $venda = Venda::with('itensVenda')->findOrFail($id_venda);
        $clientes = Cliente::all();
        $vendedores = Vendedor::all();
        $produtos = Produto::all();

        return view('vendas.edit', compact('venda', 'clientes', 'vendedores', 'produtos'));
    }

    public function update(Request $request, $id_venda)
    {

        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_vendedor' => 'required|exists:vendedores,id_vendedor',
            'data_venda' => 'required|date',
            'itens.*.id_produto' => 'required|exists:produtos,id_produto',
            'itens.*.quantidade' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request, $id_venda) {
            $venda = Venda::findOrFail($id_venda);
            $venda->id_cliente = $request->id_cliente;
            $venda->id_vendedor = $request->id_vendedor;
            $venda->data_venda = $request->data_venda;
            $venda->save();

            // Deletar os itens antigos e adicionar os novos
            ItemVenda::where('id_venda', $venda->id_venda)->delete();

            foreach ($request->itens as $item) {
                $produto = Produto::findOrFail($item['id_produto']);
                $itemVenda = new ItemVenda();
                $itemVenda->id_venda = $venda->id_venda;
                $itemVenda->id_produto = $produto->id_produto;
                $itemVenda->quantidade = $item['quantidade'];
                $itemVenda->preco_unitario = $produto->preco;
                $itemVenda->save();
            }
        });

        return redirect()->route('vendas.index')->with('msg', 'Venda atualizada com sucesso!');
    }

    public function destroy($id_venda)
    {
        try {
            $venda = Venda::findOrFail($id_venda);
            $venda->delete();
            return redirect()->route('vendas.index')->with('msg', 'Venda excluída com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('vendas.index')->with('msg', 'Erro ao excluir a venda.');
        }
    }
}
