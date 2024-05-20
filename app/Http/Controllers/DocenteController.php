<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
use Exception;

class DocenteController extends Controller
{
    /**
     * Lista de todos los docentes
     * Tipo: GET
     */
    public function listDocentes()
    {
        $docentes = Docente::all();
        
        return response()->json([
            'docentes' => $docentes,
            'status'   => true
        ]);
    }

    /**
     * Busca un docente por código
     * Tipo: GET
     * @param int $codigo
     * @return \Illuminate\Http\JsonResponse
     */
    public function findDocente($codigo)
    {
        try {
            $docente = Docente::findOrFail($codigo);

            return response()->json([
                'docente' => $docente,
                'status'  => true
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Docente no encontrado',
                'status'  => false
            ], 404);
        }
    }

    /**
     * Realiza el registro de un nuevo docente
     * Tipo: POST
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveDocente(Request $request)
    {
        try {
            $docente = new Docente;
            $docente->name = $request->name;
            $docente->address = $request->address;
            $docente->city = $request->city;
            $docente->email = $request->email;
            $docente->estado = $request->estado;

            $docente->save();

            return response()->json([
                'message' => 'Docente registrado con éxito',
                'status'  => true
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error en registro de docente',
                'status'  => false
            ], 500);
        }
    }

    /**
     * Realiza la actualización de un docente
     * Tipo: PUT
     * @param \Illuminate\Http\Request $request
     * @param int $codigo
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateDocente(Request $request, $codigo)
    {
        try {
            $docente = Docente::findOrFail($codigo);
            $docente->name = $request->name;
            $docente->address = $request->address;
            $docente->city = $request->city;
            $docente->email = $request->email;
            $docente->estado = $request->estado;

            $docente->save();

            return response()->json([
                'message' => 'Docente actualizado con éxito',
                'status'  => true
            ]);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error en actualización de docente',
                'status'  => false
            ], 500);
        }
    }

    /**
     * Elimina un docente
     * Tipo: DELETE
     * @param int $codigo
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteDocente($codigo)
    {
        try {
            $docente = Docente::findOrFail($codigo);
            $docente->delete();

            return response()->json([
                'message' => 'Docente eliminado con éxito',
                'status'  => true
            ]);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error en eliminación de docente',
                'status'  => false
            ], 500);
        }
    }
}
