<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventosPost;
use App\Models\Especies;
use App\Models\Eventos;
use Illuminate\Http\Request;



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
        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $request->file('imagen')->store('eventos', 'public');
        }

        $usuario = auth()->user();
        $evento = $usuario->eventosOrganizados()->create($datos);

        if ($request->has('especies')) {
            $evento->especies()->attach($request->especies);
        }

        // SUMAR 4 DE KARMA
        $usuario->increment('karma', 4);

        return redirect()->route('eventos.index')
            ->with('success', 'Evento creado correctamente. ¡Has ganado 4 de karma!');
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
    {
        $especies = Especies::all();
        $eventos = Eventos::findOrFail($id);
        return view('eventos.edit', compact('eventos', 'especies'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(EventosPost $request, string $id)
    {
        $evento = Eventos::findOrFail($id);
        $datos = $request->validated();

        if ($request->hasFile('imagen')) {

            // 2. Guardar la nueva imagen
            $datos['imagen'] = $request->file('imagen')->store('eventos', 'public');
        }

        // 3. Sincronizar las especies (Many-to-Many)
        // Es vital añadir esto para que los cambios en el select múltiple se guarden
        if ($request->has('especies')) {
            $evento->especies()->sync($request->especies);
        } else {
            // Si el usuario desmarca todas, vaciamos la relación
            $evento->especies()->detach();
        }

        $evento->update($datos);

        return redirect()->route('eventos.index')->with('success', 'Evento actualizado correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = auth()->user();
        Eventos::findOrFail($id)->delete();
        $usuario->decrement('karma', 4);

        return redirect('eventos');
    }
}
