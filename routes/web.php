<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilizadorController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\ClienteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('home');
});


Route::get('/autotech', [Controller::class,'autotech'
])->name('autotech')->middleware('auth'); // 🔒 Apenas usuários autenticados podem acessar

// Rotas para processar os formulários
Route::post('/registrar_viatura', [CarroController::class, 'store'])->name('carro.registrar');
Route::post('/funcionario', [FuncionarioController::class, 'store'])->name('funcionario.registrar');
Route::post('/servico', [ServicoController::class, 'store'])->name('servico.registrar');

// login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// Página do formulário de registro
Route::get('/criar', [ClienteController::class, 'showRegisterForm'])->name('criar');
Route::post('/criar', [ClienteController::class, 'criar'])->name('criar.post');

// Generico
Route::get('/Recibo', [Controller::class, 'gerarPDFCarro'])->name('gerar.carro.pdf');

//Carro
Route::post('/updateEstado', [CarroController::class, 'updateEstado'])->name('carro.updateEstado');

