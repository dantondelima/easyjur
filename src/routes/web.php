<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use \App\Http\Controllers\DicaController;
use Illuminate\Support\Facades\Route;

Route::get('', [DicaController::class, 'home'])->name('home');

Route::group(['middleware' => 'usuario'], function () {
    Route::get('/login', [UsuarioController::class, 'login'])->name('login');
    Route::post('/logar', [UsuarioController::class, 'logar'])->name('logar');
    Route::post('/logout',[UsuarioController::class, 'logout'])->name('logout');

    Route::get('/cadastro', [UsuarioController::class, 'create'])->name('usuario.create');
    Route::post('/cadastrar', [UsuarioController::class, 'store'])->name('usuario.store');

    Route::get('/perfil', [UsuarioController::class, 'edit'])->name('usuario.edit');
    Route::put('/perfil/{usuario}', [UsuarioController::class, 'update'])->name('usuario.update');

    Route::resource('dicas', 'DicaController')->middleware('usuarioPermissao');
});


