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
        
        $datos = $request->validated();

        
        if ($request->hasFile('foto_especie')) {
            $datos['foto_especie'] = $request->file('foto_especie')->store('especies', 'public');
        }

       
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
        
        $especie = Especies::findOrFail($id);

        
        $datos = $request->validated();

        
        if ($request->hasFile('foto_especie')) {

    
           
            $ruta = $request->file('foto_especie')->store('especies', 'public');

            $datos['foto_especie'] = $ruta;
        }

        
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
