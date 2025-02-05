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


Route::get('/secretaria', [Controller::class,'RotaSecretaria'
])->name('formulario')->middleware('auth'); // 🔒 Apenas usuários autenticados podem acessar

// Rota para exibir os formulários
Route::get('/admin', [Controller::class,'RotaAdmin'
])->name('formulario2')->middleware('auth'); // 🔒 Apenas usuários autenticados podem acessar

Route::get('/gerente', [Controller::class,'RotaGerente'
])->name('formulario3')->middleware('auth'); // 🔒 Apenas usuários autenticados podem acessar

Route::get('/tecnico', [Controller::class,'RotaTecnico'
])->name('formulario4')->middleware('auth'); // 🔒 Apenas usuários autenticados podem acessar

Route::get('/cliente', [Controller::class,'RotaCliente'
])->name('formulario5')->middleware('auth'); // 🔒 Apenas usuários autenticados podem acessar

// Rotas para processar os formulários
Route::post('/registrar_viatura', [CarroController::class, 'store'])->name('carro.registrar');
Route::post('/funcionario', [FuncionarioController::class, 'store'])->name('funcionario.registrar');
Route::post('/servico', [ServicoController::class, 'store'])->name('servico.registrar');

// login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Página do formulário de registro
Route::get('/signup', [LoginController::class, 'showRegisterForm'])->name('signup');
Route::post('/signup', [LoginController::class, 'signup'])->name('signup.post');

// Generico
Route::get('/Recibo', [Controller::class, 'gerarPDFCarro'])->name('gerar.carro.pdf');



// Teste
Route::get('/test', function () {
    return view('test');
});
Route::get('/qrcode', [Controller::class, 'gerarQRCode'])->name('qrcode.view');

