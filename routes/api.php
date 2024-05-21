<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\MateraController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/*Gestion de Clientes*/
Route::get('/clientes',[ClientController::class, 'listClient']);
/*Busqueda de un Cliente*/
Route::get('/clientes/buscar/{codigo}',[ClientController::class, 'findClient']);
/*Registrar un nuevo Cliente*/
Route::post('clientes/save', [ClientController::class, 'saveClient']);
/*Actualizar un Cliente*/
Route::put('clientes/update/{codigo}', [ClientController::class, 'updateClient']);


Route::get('/ruta', [DocenteController::class, 'metodo']);

Route::get('/docentes', [DocenteController::class, 'listDocentes']);
Route::get('/docentes/buscar/{codigo}', [DocenteController::class, 'findDocente']);
Route::post('/docentes/save', [DocenteController::class, 'saveDocente']);
Route::put('/docentes/update/{codigo}', [DocenteController::class, 'updateDocente']);
Route::delete('/docentes/delete/{codigo}', [DocenteController::class, 'deleteDocente']);


// Listar todos los maestros
// Listar todos los maestros
Route::get('/maestros', [MaestroController::class, 'listMaestros']);

// Buscar un maestro por código
Route::get('/maestros/buscar/{codigo}', [MaestroController::class, 'findMaestro']);

// Almacenar un nuevo maestro
Route::post('/maestros/save', [MaestroController::class, 'saveMaestro']);

// Actualizar un maestro por código
Route::put('/maestros/update/{codigo}', [MaestroController::class, 'updateMaestro']);

// Eliminar un maestro por código
Route::delete('/maestros/delete/{codigo}', [MaestroController::class, 'deleteMaestro']);


Route::get('/materas', [MateraController::class, 'index']);
Route::get('/materas/{codigo}', [MateraController::class, 'show']);
Route::post('/materas', [MateraController::class, 'store']);
Route::put('/materas/{codigo}', [MateraController::class, 'update']);
Route::delete('/materas/{codigo}', [MateraController::class, 'destroy']);




