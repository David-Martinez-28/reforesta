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
            $ruta = $request->file('avatar')->store('avatars', 'public');
            $datos['avatar'] = $ruta;
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

        return redirect()->route('usuarios.index')->with('success', '¡Usuario creado con ubicación y avatar!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuarios $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuarios $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuarios $usuario)
    {
        //
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
}
