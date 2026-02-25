<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioPost;

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
    public function store(UsuarioPost $request)
    {
        $datos = $request->validated();

        if ($request->hasFile('avatar')) {
            $datos['avatar'] = $request->file('avatar')->store('avatars', 'public');
        } elseif ($request->filled('avatar_url')) {
            $datos['avatar'] = $request->input('avatar_url');
        } else {
            $datos['avatar'] = null;
        }

        Usuarios::create([
            'nombre' => $datos['nombre'],
            'nick' => $datos['nick'],
            'email' => $datos['email'],
            'password' => bcrypt($request->password),
            'ubicacion' => $request->ubicacion,
            'karma' => $request->karma ?? 0,
            'avatar' => $datos['avatar'],
            'tipo' => $request->tipo ?? 'user',
        ]);

        return redirect()->route('usuarios.index')->with('success', '¡Usuario creado correctamente!');
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
        $usuario = Usuarios::findOrFail($id);

        $usuario->update([
            'nombre' => $request->nombre,
            'nick' => $request->nick,
            'email' => $request->email,
            // Importante: Encripta la password si se cambia, o mantenla si viene vacía
            'password' => $request->filled('password') ? bcrypt($request->password) : $usuario->password,
            'ubicacion' => $request->ubicacion,
            //'karma' => $request->karma,
            'avatar' => $request->avatar,
            'tipo' => $request->tipo,
        ]);

        return redirect()->route('usuarios.index'); // Corregido a plural
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Usuarios::findOrFail($id)->delete();
        return redirect('usuarios');
    }

    public function loginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|email',
            'password' => 'required',
        ]);

        $credenciales = [
            'email' => $request->login,
            'password' => $request->password
        ];


        if (Auth::attempt($credenciales)) {

            $request->session()->regenerate();

            return redirect()->route('eventos.index');
        }


        return back()->withErrors([
            'error' => 'El correo electrónico o la contraseña son incorrectos.',
        ])->withInput($request->only('login'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->back();

    }

    public function unirse(Request $request)
    {
        $usuario = auth()->user();
        if ($usuario) {
            $usuario->eventos()->syncWithoutDetaching([$request->evento_id]);

            $usuario->increment('karma', 3);
            return back()->with('success', '¡Te has unido!');
        }
    }
    public function desunirse(Request $request)
    {
        $usuario = auth()->user();

        if ($usuario) {
            $usuario->eventos()->detach($request->evento_id);

            if ($usuario->karma >= 3) {
                $usuario->decrement('karma', 3);
            }

            return back()->with('success', 'Has abandonado el evento y se han descontado 3 puntos de karma.');
        }

        return redirect()->route('login');
    }

}
