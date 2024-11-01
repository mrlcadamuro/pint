<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;
use Illuminate\Support\Facades\Hash;

class VendedorController extends Controller
{
    public function index()
    {
        $vendedores = Vendedor::all();
        return view('vendedores.index', ['vendedores' => $vendedores]);
    }

    public function create(){
        return view('vendedores.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:vendedores',
            'senha' => 'required|string|min:8',
        ]);
    
        $vendedor = new Vendedor;
        $vendedor->nome = $request->nome;
        $vendedor->email = $request->email;
        $vendedor->senha = Hash::make($request->senha);
    
        $vendedor->save();
        return redirect()->route('vendedores.index')->with('msg', 'Vendedor cadastrado com sucesso!');
    }
    
    public function edit($id_vendedor)
    {
        $vendedor = Vendedor::findOrFail($id_vendedor);
        return view('vendedores.edit', ['vendedor' => $vendedor]);
    }

    public function update(Request $request, $id_vendedor)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:vendedores,email,' . $id_vendedor . ',id_vendedor',
            'senha' => 'nullable|string|min:8',
        ]);

        $vendedor = Vendedor::findOrFail($id_vendedor);
        $vendedor->nome = $request->nome;
        $vendedor->email = $request->email;

        if ($request->filled('senha')) {
            $vendedor->senha = Hash::make($request->senha);
        }

        $vendedor->save();

        return redirect()->route('vendedores.index')->with('msg', 'Vendedor editado com sucesso!');
    }

    public function destroy($id_vendedor)
    {
        try {
            $vendedor = Vendedor::findOrFail($id_vendedor);
            $vendedor->delete();
            return redirect()->route('vendedores.index')->with('msg', 'Vendedor excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('vendedores.index')->with('msg', 'Erro ao excluir vendedor.');
        }
    }
}
