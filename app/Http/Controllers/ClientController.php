<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Lista de todos los clientes
     * Tipo: GET
     * @author: Marco A. Luna
     */
    public function listClient(){
        $clientes = Client::get();
        
        return response()->json([
            'clientes' => $clientes,
            'status'   => true
        ]);
    }

    public function findClient($codigo){
        $cliente = Client::findOrFail($codigo);
        
        return response()->json([
            'cliente' => $cliente,
            'status'   => true
        ]);
    }


    /**
     * Realiza el registro de un nuevo cliente
     * Tipo: POST
     * @author: Marco A. Luna
     */
    public function saveClient(Request $request){
        // Crea un nuevo usuario en la base de datos
        try{
            $cliente = new Client;
            $cliente->name    = $request->name;
            $cliente->address   = $request->address;
            $cliente->city   = $request->city;
            $cliente->email = $request->email;
            $cliente->estado = $request->estado;

            $cliente->save();

            return response()->json([
                'message' => 'Cliente registrado con éxito',
                'status'  => true]);

        }catch(Exception $e){
            return response()->json([
                'message' => 'Error en registro de cliente',
                'status'  => false]);
        }
    }

    /**
     * Realiza la actualizacion de un nuevo cliente
     * Tipo: POST
     * @author: Marco A. Luna
     */
    public function updateClient(Request $request, $codigo){
        // Crea un nuevo usuario en la base de datos
        try{
            $cliente = Client::findOrFail($codigo);
            $cliente->name    = $request->name;
            $cliente->address   = $request->address;
            $cliente->city   = $request->city;
            $cliente->email = $request->email;
            $cliente->estado = $request->estado;

            $cliente->update();

            return response()->json([
                'message' => 'Cliente actualizado con éxito',
                'status'  => true]);

        }catch(Exception $e){
            return response()->json([
                'message' => 'Error en actualizacion de cliente',
                'status'  => false]);
        }
    }



}
