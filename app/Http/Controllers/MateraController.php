<?php

namespace App\Http\Controllers;

use App\Models\Matera;
use Illuminate\Http\Request;

class MateraController extends Controller
{
    public function index()
    {
        $materas = Matera::all();
        return response()->json($materas);
    }

    public function show($codigo)
    {
        $matera = Matera::where('codigo', $codigo)->firstOrFail();
        return response()->json($matera);
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:materas,codigo',
            'nombre' => 'required',
            'descripcion' => 'nullable',
        ]);

        $matera = Matera::create($request->all());

        return response()->json(['message' => 'Matera creada exitosamente', 'matera' => $matera], 201);
    }

    public function update(Request $request, $codigo)
    {
        $matera = Matera::where('codigo', $codigo)->firstOrFail();

        $request->validate([
            'codigo' => 'required|unique:materas,codigo,' . $matera->id,
            'nombre' => 'required',
            'descripcion' => 'nullable',
        ]);

        $matera->update($request->all());

        return response()->json(['message' => 'Matera actualizada exitosamente', 'matera' => $matera]);
    }

    public function destroy($codigo)
    {
        $matera = Matera::where('codigo', $codigo)->firstOrFail();
        $matera->delete();

        return response()->json(['message' => 'Matera eliminada exitosamente']);
    }
}
