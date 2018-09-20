<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

    public function create()
    {

        return view('create');
    }

    public function store(Request $request)
    {
        $file = $request->file('image');
        $filepath = "uploads/" . $file->getClientOriginalName();
        Storage::disk('s3')->put($filepath, file_get_contents($file), 'public');
        return redirect()->route('crear')
                            ->with('success', 'La imagen se subio correctamente');
    }
}
