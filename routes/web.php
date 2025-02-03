<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilizadorController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;

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

Route::get('/administrador', function () {
    return view('administrador');
});


// Rota para exibir os formulários
Route::get('/secretaria', function () {
    $formulario = request('form') ?? 'registrar_viatura';
    $controller = new Controller();
    
    $enum_cor=$controller->getEnumColorCorro();
    $enum_marca=$controller->getEnumMarcaCorro();
    $enum_tipo=$controller->getEnumTipoCorro();

    $carro = new CarroController();
    $query_carros = $carro->index();

    $utilizador = new UserController();
    $query_utilizadores = $utilizador->index();

    return view('secretaria', compact('formulario','enum_cor','enum_marca','enum_tipo','query_carros','query_utilizadores'));
});//->middleware('auth'); // 🔒 Apenas usuários autenticados podem acessar

// Rotas para processar os formulários
Route::post('/registrar_viatura', [CarroController::class, 'store'])->name('carro.registrar');
Route::post('/funcionario', [FuncionarioController::class, 'store'])->name('funcionario.registrar');

// login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Página do formulário de registro
Route::get('/signup', [LoginController::class, 'showRegisterForm'])->name('signup');
Route::post('/signup', [LoginController::class, 'signup'])->name('signup.post');