<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function index() {
        $clientes = Cliente::all();
        return view('clientes.index', ['clientes' => $clientes]); // Corrigido para 'clientes'
    }

    public function create() {
        return view('clientes.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clientes',
            'senha' => 'required|string|min:8',
        ]);
    
        $cliente = new Cliente();
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->senha = Hash::make($request->senha); // Criptografa a senha
    
        $cliente->save(); // Salva o cliente no banco de dados
        return redirect()->route('clientes.index')->with('msg', 'Cliente cadastrado com sucesso!');
    }

    public function edit($id_cliente) {
        $cliente = Cliente::findOrFail($id_cliente);
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    public function update(Request $request, $id_cliente) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clientes,email,' . $id_cliente . ',id_cliente', // Ajuste para id_cliente
        ]);

        $cliente = Cliente::findOrFail($id_cliente);
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        
        if ($request->filled('senha')) {
            $cliente->senha = Hash::make($request->senha); // Atualiza a senha se fornecida
        }
        
        $cliente->save();
    
        return redirect()->route('clientes.index')->with('msg', 'Cliente atualizado com sucesso!');
    }

    public function destroy($id_cliente) {
        $cliente = Cliente::findOrFail($id_cliente);
        $cliente->delete();
    
        return redirect()->route('clientes.index')->with('msg', 'Cliente excluído com sucesso!');
    }
}
