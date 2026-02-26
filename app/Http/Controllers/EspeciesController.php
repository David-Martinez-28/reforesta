<?php

namespace App\Http\Controllers;

use App\Http\Requests\EspeciesPost;
use App\Models\Especies;
use App\Http\Requests\EspeciesModificarPost;
use Illuminate\Http\Request;

class EspeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especies = Especies::all();
        return view("especies.index", compact("especies"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(view: 'especies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EspeciesPost $request)
    {
        // 1. Obtener los datos ya validados
        $datos = $request->validated();

        // 2. Gestionar la subida de la foto
        if ($request->hasFile('foto_especie')) {
            $datos['foto_especie'] = $request->file('foto_especie')->store('especies', 'public');
        }

        // 3. Crear el registro de forma directa (sin relación)
        Especies::create($datos);


        return redirect()->route('especies.index')
            ->with('success', 'Especie guardada correctamente. ¡Has ganado 4 de karma!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $especie = Especies::findOrFail($id);
        return view('especies.show', compact('especie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $especies = Especies::findOrFail($id);
        return view('especies.edit', compact('especies'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(EspeciesModificarPost $request, string $id)
    {
        // 1. Buscamos el registro (findOrFail lanza 404 si no existe)
        $especie = Especies::findOrFail($id);

        // 2. Obtenemos solo los datos validados del Form Request
        $datos = $request->validated();

        // 3. Gestión del archivo físico
        if ($request->hasFile('foto_especie')) {

    
            // Guardamos el nuevo archivo y obtenemos la ruta
            $ruta = $request->file('foto_especie')->store('especies', 'public');

            // Sobrescribimos el valor en el array de datos
            $datos['foto_especie'] = $ruta;
        }

        // 4. Actualizamos el registro con el array final
        $especie->update($datos);

        return redirect()->route('especies.index')->with('success', 'Especie actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Especies::findOrFail($id)->delete();
        return redirect('especies');
    }
}
