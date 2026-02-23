<?php

namespace App\Http\Controllers;

use App\Models\Especies;
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
    public function store(Request $request)
    {
        Especies::create([
            'nombre_cientifico' => $request->nombre_cientifico,
            'tiempo_para_adultez' => $request->tiempo_para_adultez,
            'region_origen' => $request->region_origen,
            'clima' => $request->clima,
            'enlace_descripcion' => $request->enlace_descripcion,
            'foto_especie' => $request->foto_especie,
            'beneficios' => $request->beneficios,
        ]);

        return redirect()->route('especies.index')->with('success', 'Especie creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $especie = Especies::findOrFail($id);
        return view('especie.show', compact('especie'));
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
    public function update(Request $request, string $id)
    {

        $especies = Especies::find($id);

        if (filled($especies)) {
            $especies->update([
                'nombre_cientifico' => $request->nombre_cientifico,
                'tiempo_para_adultez' => $request->tiempo_para_adultez,
                'region_origen' => $request->region_origen,
                'clima' => $request->clima,
                'enlace_descripcion' => $request->enlace_descripcion,
                'foto_especie' => $request->foto_especie,
                'beneficios' => $request->beneficios,
            ]);

        }

        return redirect()->route('especies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Especies::findOrFail($id)->delete();
        return redirect('usuario');
    }
}
