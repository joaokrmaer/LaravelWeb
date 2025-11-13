<?php

use Illuminate\Support\Facades\Route;

// Página inicial (login)
Route::view('/', 'auth.login')->name('login');

// Tela de registro
Route::view('/register', 'auth.register')->name('register');

// Dashboard depois de logado
Route::view('/dashboard', 'dashboard.index')->name('dashboard')->middleware('auth');

// CRUD de Endereços
Route::middleware('auth')->group(function () {

    // Usuário
    Route::view('/profile', 'user.profile')->name('profile');

    // Produtos (apenas admin pode ver essas telas, mas validação real é feita na API)
    Route::view('/products', 'products.index')->name('products.index');
    Route::view('/products/create', 'products.create')->name('products.create');
    Route::view('/products/{id}/edit', 'products.edit')->name('products.edit');

    // Ativos
    Route::view('/actives', 'actives.index')->name('actives.index');
    Route::view('/actives/create', 'actives.create')->name('actives.create');
    Route::view('/actives/{id}/edit', 'actives.edit')->name('actives.edit');

    // Transferências
    Route::view('/transfers', 'transfers.index')->name('transfers.index');
    Route::view('/transfers/create', 'transfers.create')->name('transfers.create');

});
