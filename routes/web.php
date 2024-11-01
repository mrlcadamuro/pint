<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\PagamentoController;


Route::middleware('auth')->group(function () {

Route::get('/carrinho/index', [CarrinhoController::class, 'index'])->name('carrinho.index');


Route::get('/produtos/exibir', [ProdutoController::class, 'exibir'])->name('produtos.exibir');
Route::resource('produtos', ProdutoController::class)->except(['show']);
Route::get('/produtos/{id_produto}', [ProdutoController::class, 'show'])->name('produtos.show');
Route::post('/produtos/adicionar/{id}', [ProdutoController::class, 'adicionar'])->name('produtos.adicionar');


    
    // Vendedores
    Route::prefix('vendedores')->group(function () {
        Route::get('/index', [VendedorController::class, 'index'])->name('vendedores.index');
        Route::get('/create', [VendedorController::class, 'create'])->name('vendedores.create');
        Route::post('/', [VendedorController::class, 'store'])->name('vendedores.store');
        Route::get('/edit/{id_vendedor}', [VendedorController::class, 'edit'])->name('vendedores.edit'); 
        Route::put('/{id_vendedor}', [VendedorController::class, 'update'])->name('vendedores.update'); 
        Route::delete('/{id_vendedor}', [VendedorController::class, 'destroy'])->name('vendedores.destroy'); 
    });

    // Clientes
    Route::prefix('clientes')->group(function () {
        Route::get('/index', [ClienteController::class, 'index'])->name('clientes.index');
        Route::get('/create', [ClienteController::class, 'create'])->name('clientes.create');
        Route::post('/', [ClienteController::class, 'store'])->name('clientes.store'); // Alterado
        Route::get('/edit/{id_cliente}', [ClienteController::class, 'edit'])->name('clientes.edit'); // Alterado
        Route::put('/{id_cliente}', [ClienteController::class, 'update'])->name('clientes.update');
        Route::delete('/{id_cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
    });

    Route::prefix('vendas')->group(function () {
        Route::get('/index', [VendaController::class, 'index'])->name('vendas.index');
        Route::get('/create', [VendaController::class, 'create'])->name('vendas.create');
        Route::post('/store', [VendaController::class, 'store'])->name('vendas.store');
        Route::get('/edit/{id_venda}', [VendaController::class, 'edit'])->name('vendas.edit');
        Route::put('/{id_venda}', [VendaController::class, 'update'])->name('vendas.update');
        Route::delete('/{id_venda}', [VendaController::class, 'destroy'])->name('vendas.destroy');
    });
    

    Route::get('/login', function () {
        return view('admin.index');
    })->name('login'); 

    Route::get('/admin', function () {
        return view('admin.index'); 
    })->name('admin.index');

});

//rotas que não precisam de segurança

Route::get('/', function () {
    return view('home.index'); 
})->name('home.index');
Route::get('/sobre', function () {
    return view('sobre.index'); 
})->name('sobre.index');
Route::get('/servicos', function (){
    return view('servicos.index');
})->name('servicos.index');

Route::get('/admin/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::post('/admin/register', [AuthController::class, 'register']);
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/admin/login', [AuthController::class, 'login']);

    

Route::get('/pagamento', [PagamentoController::class, 'criarPagamento'])->name('pagamento.criar');
Route::get('/pagamento/sucesso', [PagamentoController::class, 'sucesso'])->name('pagamento.sucesso');
Route::get('/pagamento/falha', [PagamentoController::class, 'falha'])->name('pagamento.falha');
Route::get('/pagamento/pendente', [PagamentoController::class, 'pendente'])->name('pagamento.pendente');

   
    