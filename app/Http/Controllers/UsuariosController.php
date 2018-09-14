<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsuariosController extends Controller
{
    public function index(Request $request)
    {
        $usuarios = User::orderBy('id', 'DESC')
                        ->name($request->name)
                        ->email($request->email)
                        ->bio($request->bio)
                        ->paginate(10);

        return view('index', compact('usuarios'));
    }
}
