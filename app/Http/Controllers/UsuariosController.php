<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioPost;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\LoginPost;
use App\Models\Eventos;
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

        $usuario = Usuarios::create([
            'nombre' => $datos['nombre'],
            'nick' => $datos['nick'],
            'email' => $datos['email'],
            'password' => bcrypt($request->password),
            'ubicacion' => $request->ubicacion,
            'karma' => $request->karma ?? 0,
            'avatar' => $datos['avatar'],
            'tipo' => $request->tipo ?? 'user',

        ]);

        Auth::login($usuario);

        $request->session()->regenerate();

        return redirect()->route('eventos.index')->with('success', '¡Usuario creado correctamente!');
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
    public function update(UsuarioPost $request, string $id)
    {
        $usuario = Usuarios::findOrFail($id);

        // 1. Obtener datos validados
        $datos = $request->validated();

        // 2. Lógica del Avatar
        if ($request->hasFile('avatar')) {

            // --- MEJORA: Borrar el archivo viejo si existe ---
            if ($usuario->avatar && Storage::disk('public')->exists($usuario->avatar)) {
                Storage::disk('public')->delete($usuario->avatar);
            }

            // Guardar el nuevo
            $datos['avatar'] = $request->file('avatar')->store('avatars', 'public');

        } else {
            // Si no sube nada, nos aseguramos de no tocar lo que ya hay en la BD
            unset($datos['avatar']);
        }

        // 3. Lógica de Contraseña (bcrypt)
        if ($request->filled('password')) {
            $datos['password'] = bcrypt($request->password);
        } else {
            unset($datos['password']);
        }

        // 4. Actualizar una sola vez
        $usuario->update($datos);

        return redirect()->route('usuarios.show', $usuario->id)
            ->with('success', 'Perfil actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuarios::findOrFail($id);
        $usuario->delete();
        
        return redirect()->route('eventos.index')
            ->with('success', 'Evento eliminado y se han restado 4 puntos de karma.');
    }
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(LoginPost $request)
    {
        // 1. Los datos ya vienen validados por LoginPost
        $credenciales = [
            'email' => $request->login, // Mapeamos 'login' del form a 'email' de la DB
            'password' => $request->password
        ];

        // 2. Intentar el login
        if (Auth::attempt($credenciales)) {
            // Éxito: Regenerar sesión por seguridad
            $request->session()->regenerate();
            return redirect()->route('eventos.index');
        }

        // 3. Error: Credenciales no coinciden con la base de datos
        return back()->withErrors([
            'error_auth' => 'El correo electrónico o la contraseña son incorrectos.',
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
