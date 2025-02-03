<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Listar todos os utilizadores
    public function index()
    {
        $utilizadores = User::all();
        return $utilizadores;
    }
}
