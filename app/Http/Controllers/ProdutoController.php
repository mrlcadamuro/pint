<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\ItemVenda;

use Illuminate\Support\Facades\Auth;


class ProdutoController extends Controller
{
    public function index() {
        $produtos = Produto::all();
        return view('produtos.index', ['produtos' => $produtos]);
    }

    public function create() {
        return view('produtos.create');
    }

    public function store(Request $request) {
        // Valida os campos do produto
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;
        $produto->estoque = $request->estoque;

        // Upload da Imagem
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/produtos'), $imageName);
            $produto->image = $imageName;
        }

        $produto->save();

        return redirect()->route('produtos.exibir')->with('msg', 'Produto criado com sucesso!');
    }

    public function edit($id_produto) {
        $produto = Produto::findOrFail($id_produto);
        return view('produtos.edit', ['produto' => $produto]);
    }

    public function update(Request $request, $id_produto) {
        // Valida os campos do produto
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $produto = Produto::findOrFail($id_produto);
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;
        $produto->estoque = $request->estoque;

        // Verifica se há uma nova imagem sendo enviada
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/produtos'), $imageName);
            $produto->image = $imageName;
        }

        $produto->save();

        return redirect()->route('produtos.exibir')->with('msg', 'Produto atualizado com sucesso!');
    }

    public function destroy($id_produto) {
        $produto = Produto::findOrFail($id_produto);
        $produto->delete();
        return redirect()->route('produtos.exibir')->with('msg', 'Produto excluído com sucesso!');
    }

    public function exibir() {
        $produtos = Produto::all();
        return view('produtos.exibir', compact('produtos'));
    }

    public function show($id_produto) {
        $produto = Produto::findOrFail($id_produto); // Busca o produto pelo ID ou lança um erro 404
        return view('produtos.show', ['produto' => $produto]); // Retorna a view com o produto
    }
    
    public function comprar($id_produto) {
        $produto = Produto::findOrFail($id_produto);
        // Aqui, você pode adicionar a lógica de compra do produto
        return view('produtos.comprar', compact('produto'));
    }
    




    public function adicionar($id_produto) {
        $idusuario = Auth::id();
    
        // Obtém o produto
        $produto = Produto::find($id_produto);
        if (!$produto) {
            return redirect()->route('produtos.index')->with('error', 'Produto não encontrado.');
        }
    
        // Consulta o  em aberto para o usuário logado
        $idvenda = Venda::where('id_usuario', $idusuario)->value('id_venda');
    
        // Cria um novo  se não houver um  em aberto
        if (!$idvenda) {
            $pedido_novo = Venda::create(['id_usuario' => $idusuario]);
            $idvenda = $pedido_novo->id_venda; // Use o nome correto da chave primária
        }
    
        // Adiciona o produto ao 
        ItemVenda::create([
            'id_venda' => $idvenda,
            'id_produto' => $id_produto,
            'preco_unitario' => $produto->preco,
            'quantidade' => 1,
            'subtotal' => $produto->preco // Aqui você pode adicionar o subtotal
        ]);
    
        return redirect()->route('carrinho.index')->with('success', 'Produto adicionado ao carrinho com sucesso!');
    }
    
    
}
