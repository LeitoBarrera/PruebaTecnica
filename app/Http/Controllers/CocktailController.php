<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Cocktail;

class CocktailController extends Controller
{
    // Mostrar cócteles desde la API
    public function index()
    {
        $response = Http::timeout(1000)->get('https://www.thecocktaildb.com/api/json/v1/1/search.php?f=a');
        $cocteles = $response->json()['drinks'] ?? [];
        return view('cocteles.index', compact('cocteles'));
    }

    // Mostrar formulario para crear un nuevo cóctel
    public function create()
    {
        return view('cocteles.create');
    }

    // Guardar un nuevo cóctel
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'nullable|string|max:255',
            'tipo_bebida' => 'nullable|string|max:255',
        ]);

        // Crear el cóctel en la base de datos
        Cocktail::create($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('cocktails.index')->with('success', 'Cóctel guardado correctamente.');
    }

    // Mostrar cócteles guardados
    public function saved()
    {
        $cocteles = Cocktail::all();
        return view('cocteles.saved', compact('cocteles'));
    }

    // Mostrar formulario para editar un cóctel
    public function edit($id)
    {
        $cocktail = Cocktail::findOrFail($id);
        return view('cocteles.edit', compact('cocktail'));
    }

    // Actualizar un cóctel
    public function update(Request $request, $id)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'nullable|string|max:255',
            'tipo_bebida' => 'nullable|string|max:255',
        ]);

        // Encontrar el cóctel y actualizar los datos
        $coctel = Cocktail::findOrFail($id);
        $coctel->update($validated);

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Datos actualizados correctamente.');
    }

    // Eliminar un cóctel
    public function destroy($id)
{
    $coctel = Cocktail::findOrFail($id);
    $coctel->delete();

    // Redirigir con mensaje de éxito y luego con pop-up
    return redirect()->route('cocktails.index')->with('success', 'Cóctel eliminado correctamente.');
}
}
