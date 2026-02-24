<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Auth;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        return view("usuario.index", compact("usuarios"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Usuarios::create([
            'nombre' => $request->nombre,
            'nick' => $request->nick,
            'email' => $request->email,
            'password' => $request->password,
            'ubicacion' => $request->ubicacion,
            'karma' => $request->karma,
            'avatar' => $request->avatar,
            'tipo' => $request->tipo,
        ]);

        return redirect()->route('usuario.index')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuarios::findOrFail($id);
        return view('usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = Usuarios::findOrFail($id);
        return view('usuario.edit', compact('usuario'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $usuario = Usuarios::find($id);

        if (filled($usuario)) {
            $usuario->update([
                'nombre' => $request->nombre,
                'nick' => $request->nick,
                'email' => $request->email,
                'password' => $request->password,
                'ubicacion' => $request->ubicacion,
                'karma' => $request->karma,
                'avatar' => $request->avatar,
                'tipo' => $request->tipo,
            ]);

        }

        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Usuarios::findOrFail($id)->delete();
        return redirect('usuario');
    }

    public function loginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $credenciales = $request->only('login', 'password');

        if (Auth::attempt($credenciales)) {
            return redirect()->route('eventos.index');
        } else {
            $error = 'Usuario incorrecto';
            return view('auth.login', compact('error'));
        }
    }
    public function logout()
    {
        Auth::logout();

    }

    public function unirse(Usuarios $usuario)
    {
        $usuario->increment('karma');

        return redirect()->route('usuario.index')->with('success', '¡Te has unido al evento y el karma ha subido!');
    }
}
