<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventosPost;
use App\Models\Especies;
use App\Models\Eventos;
use Illuminate\Http\Request;
use App\Models\Usuarios;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager loading para evitar errores y lentitud
        $eventos = Eventos::with(['asistentes', 'especies'])->get();
        return view('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {

        $especies = Especies::all();


        return view('eventos.create', compact('especies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventosPost $request)
    {
        $datos = $request->validated();

        $evento = auth()->user()->eventosOrganizados()->create($datos);

        if ($request->has('especies')) {
            $evento->especies()->attach($request->especies);
        }

        return redirect()->route('eventos.index')
            ->with('success', 'Evento creado correctamente con sus especies.');
    }

    /**
     * Display the specified resource.
     */
    public function unirse(Request $request)
    {
        $usuario = auth()->user();
        if ($usuario) {
            $usuario->eventos()->syncWithoutDetaching([$request->evento_id]);

            $usuario->increment('karma', 3);
            return back()->with('success', '¡Te has unido!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show($id)
    {
        $evento = Eventos::with(['asistentes', 'especies'])->findOrFail($id);
        return view('eventos.show', compact('evento'));
    }
    public function edit(string $id)
    {   $especies=Especies::all();
        $eventos = Eventos::findOrFail($id);
        return view('eventos.edit', compact('eventos','especies'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(EventosPost $request, string $id)
    {

        // findOrFail lanza un error 404 automáticamente si no existe el ID
        $evento = Eventos::findOrFail($id);

        // Esto solo toma los datos que definiste en las reglas de EventosPost
        $datos = $request->validated();

        // Si manejas subida de archivos para 'imagen', hazlo aquí antes del update
        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $request->file('imagen')->store('eventos', 'public');
        }

        $evento->update($datos);

        return redirect()->route('eventos.index')->with('success', 'Evento actualizado');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Eventos::findOrFail($id)->delete();
        return redirect('eventos');
    }
}
