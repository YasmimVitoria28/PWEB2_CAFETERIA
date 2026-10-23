<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CupomController;
use App\Http\Controllers\FornecedorController;

Route::get('/', function () {
    return view('main');
});

// Produto
Route::get('/produto', [ProdutoController::class, 'index'])->name('produto.index');
Route::get('/produto/create', [ProdutoController::class, 'create']);
Route::post('/produto/store', [ProdutoController::class, 'store'])->name('produto.store');
Route::get('/produto/edit/{id}', [ProdutoController::class, 'edit'])->name('produto.edit');
Route::put('/produto/update/{id}', [ProdutoController::class, 'update'])->name('produto.update');
Route::delete('/produto/{id}', [ProdutoController::class, 'destroy'])->name('produto.destroy');
Route::post('/produto/search', [ProdutoController::class, 'search'])->name('produto.search');

// Funcionario
Route::get('/funcionario', [FuncionarioController::class, 'index'])->name('funcionario.index');
Route::get('/funcionario/create', [FuncionarioController::class, 'create']);
Route::post('/funcionario/store', [FuncionarioController::class, 'store'])->name('funcionario.store');
Route::get('/funcionario/edit/{id}', [FuncionarioController::class, 'edit'])->name('funcionario.edit');
Route::put('/funcionario/update/{id}', [FuncionarioController::class, 'update'])->name('funcionario.update');
Route::delete('/funcionario/{id}', [FuncionarioController::class, 'destroy'])->name('funcionario.destroy');
Route::post('/funcionario/search', [FuncionarioController::class, 'search'])->name('funcionario.search');

// Post
Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostController::class, 'create']);
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::put('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
Route::post('/post/search', [PostController::class, 'search'])->name('post.search');
Route::get('/post/report/{id}', [PostController::class, 'report'])->name('post.report'); //relatório
Route::get('/post/chart', [PostController::class, 'chart'])->name('post.chart'); //grafico

// Cupom
Route::get('/cupom', [CupomController::class, 'index'])->name('cupom.index'); 
Route::get('/cupom/create', [CupomController::class, 'create']);
Route::post('/cupom/store', [CupomController::class, 'store'])->name('cupom.store');
Route::get('/cupom/edit/{id}', [CupomController::class, 'edit'])->name('cupom.edit');
Route::put('/cupom/update/{id}', [CupomController::class, 'update'])->name('cupom.update');
Route::delete('/cupom/{id}', [CupomController::class, 'destroy'])->name('cupom.destroy');
Route::post('/cupom/search', [CupomController::class, 'search'])->name('cupom.search');

// Fornecedor
Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('fornecedor.index');
Route::get('/fornecedor/create', [FornecedorController::class, 'create']);
Route::post('/fornecedor/store', [FornecedorController::class, 'store'])->name('fornecedor.store');
Route::get('/fornecedor/edit/{id}', [FornecedorController::class, 'edit'])->name('fornecedor.edit');
Route::put('/fornecedor/update/{id}', [FornecedorController::class, 'update'])->name('fornecedor.update');
Route::delete('/fornecedor/{id}', [FornecedorController::class, 'destroy'])->name('fornecedor.destroy');
Route::post('/fornecedor/search', [FornecedorController::class, 'search'])->name('fornecedor.search');
Route::get('/fornecedor/report', [FornecedorController::class, 'report'])->name('fornecedor.report'); //relatório
Route::get('/fornecedor/chart', [FornecedorController::class, 'chart'])->name('fornecedor.chart');//grafico