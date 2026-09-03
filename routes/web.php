<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('main');
});


// Produto
Route::get('/produto', [ProdutoController::class, 'index']);
Route::get('/produto/create', [ProdutoController::class, 'create']);
Route::post('/produto/store', [ProdutoController::class, 'store'])->name('produto.store');
Route::get('/produto/edit/{id}', [ProdutoController::class, 'edit'])->name('produto.edit');
Route::put('/produto/update/{id}', [ProdutoController::class, 'update'])->name('produto.update');
Route::delete('/produto/{id}', [ProdutoController::class, 'destroy'])->name('produto.destroy');
Route::post('/produto/search', [ProdutoController::class, 'search'])->name('produto.search');

// Usuario
Route::get('/usuario', [UsuarioController::class, 'index']);
Route::get('/usuario/create', [UsuarioController::class, 'create']);
Route::post('/usuario/store', [UsuarioController::class, 'store'])->name('usuario.store');
Route::get('/usuario/edit/{id}', [UsuarioController::class, 'edit'])->name('usuario.edit');
Route::put('/usuario/update/{id}', [UsuarioController::class, 'update'])->name('usuario.update');
Route::delete('/usuario/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');
Route::post('/usuario/search', [UsuarioController::class, 'search'])->name('usuario.search');

// Post
Route::get('/post', [PostController::class, 'index']);
Route::get('/post/create', [PostController::class, 'create']);
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::put('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
Route::post('/post/search', [PostController::class, 'search'])->name('post.search');
