<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Cocktail;

class CocktailController extends Controller
{
    public function index()
    {
        $response = Http::timeout(30)->get('https://www.thecocktaildb.com/api/json/v1/1/search.php?f=a');
        $cocteles = $response->json()['drinks'] ?? [];
        return view('cocteles.index', compact('cocteles'));
    }

    public function create()
    {
        return view('cocteles.create');
    }

    public function store(Request $request)
{
    // Validación
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'categoria' => 'nullable|string|max:255',
        'tipo_bebida' => 'nullable|string|max:255',
    ]);

    // Guardar en la base de datos
    Cocktail::create([
        'nombre' => $validated['nombre'],
        'categoria' => $validated['categoria'],
        'tipo_bebida' => $validated['tipo_bebida'],
    ]);

    // Redirigir con un mensaje de éxito
    return redirect()->route('cocktails.index')->with('success', 'Cóctel guardado correctamente.');
}
    public function saved()
    {
        $cocteles = Cocktail::all();
        return view('cocteles.saved', compact('cocteles'));
    }

    public function edit($id)
    {
        $coctel = Cocktail::findOrFail($id);
        return view('cocteles.edit', compact('coctel'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'nullable|string|max:255',
            'tipo_bebida' => 'nullable|string|max:255',
        ]);

        $coctel = Cocktail::findOrFail($id);
        $coctel->update($validated);

        return redirect()->route('cocktails.saved')->with('success', 'Cóctel actualizado correctamente.');
    }

    public function destroy($id)
    {
        $coctel = Cocktail::findOrFail($id);
        $coctel->delete();

        return redirect()->route('cocktails.saved')->with('success', 'Cóctel eliminado correctamente.');
    }
}
