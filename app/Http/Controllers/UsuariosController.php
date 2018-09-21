<?php

namespace App\Http\Controllers;

use App\Imagen;
use Illuminate\Http\Request;
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
        $images = Imagen::all();
        return view('create', compact('images'));
    }

    public function store(Request $request)
    {
        $file = $request->file('image');
        $filepath = "uploads/" . $file->getClientOriginalName();

        $image = Imagen::create(['url' => $filepath]);
        Storage::disk('s3')->put($image->url, file_get_contents($file), 'public');

        return redirect()
                    ->route('crear')
                    ->with('success', 'La imagen se subio correctamente');
    }

    public function delete($id)
    {
        $image = Imagen::find($id);
        Storage::disk('s3')->delete($image->url);
        Imagen::destroy($id);
        return redirect()
                    ->route('crear')
                    ->with('success', 'La imagen se elimino correctamente');
    }
}
