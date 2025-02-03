<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilizadorController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\Controller;

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

    $utilizador = new UtilizadorController();
    $query_utilizadores = $utilizador->index();

    return view('secretaria', compact('formulario','enum_cor','enum_marca','enum_tipo','query_carros','query_utilizadores'));
})->name('formulario');

// Rotas para processar os formulários
Route::post('/registrar_viatura', [CarroController::class, 'store'])->name('carro.registrar');

// Rota de login
/*Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Rota protegida
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

*/

// Utilizador e Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [UtilizadorController::class, 'login']);