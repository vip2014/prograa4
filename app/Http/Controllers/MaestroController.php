<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maestro;
use Exception;

class MaestroController extends Controller
{
    /**
     * Lista de todos los maestros
     * Tipo: GET
     */
    public function listMaestros()
    {
        $maestros = Maestro::all();
        
        return response()->json([
            'maestros' => $maestros,
            'status'   => true
        ]);
    }

    /**
     * Busca un maestro por código
     * Tipo: GET
     * @param int $codigo
     * @return \Illuminate\Http\JsonResponse
     */
    public function findMaestro($codigo)
    {
        try {
            $maestro = Maestro::findOrFail($codigo);

            return response()->json([
                'maestro' => $maestro,
                'status'  => true
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Maestro no encontrado',
                'status'  => false
            ], 404);
        }
    }

    /**
     * Realiza el registro de un nuevo maestro
     * Tipo: POST
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveMaestro(Request $request)
    {
        try {
            $maestro = new Maestro;
            $maestro->nombre = $request->nombre;
            $maestro->apellido = $request->apellido;
            $maestro->email = $request->email;
            $maestro->profesion = $request->profesion;
            $maestro->edad = $request->edad;

            $maestro->save();

            return response()->json([
                'message' => 'Maestro registrado con éxito',
                'status'  => true
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error en registro de maestro',
                'status'  => false
            ], 500);
        }
    }

    /**
     * Realiza la actualización de un maestro
     * Tipo: PUT
     * @param \Illuminate\Http\Request $request
     * @param int $codigo
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateMaestro(Request $request, $codigo)
    {
        try {
            $maestro = Maestro::findOrFail($codigo);
            $maestro->nombre = $request->nombre;
            $maestro->apellido = $request->apellido;
            $maestro->email = $request->email;
            $maestro->profesion = $request->profesion;
            $maestro->edad = $request->edad;

            $maestro->save();

            return response()->json([
                'message' => 'Maestro actualizado con éxito',
                'status'  => true
            ]);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error en actualización de maestro',
                'status'  => false
            ], 500);
        }
    }

    /**
     * Elimina un maestro
     * Tipo: DELETE
     * @param int $codigo
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteMaestro($codigo)
    {
        try {
            $maestro = Maestro::findOrFail($codigo);
            $maestro->delete();

            return response()->json([
                'message' => 'Maestro eliminado con éxito',
                'status'  => true
            ]);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error en eliminación de maestro',
                'status'  => false
            ], 500);
        }
    }
}
