<?php

use App\Http\Controllers\FormularioController;
use App\Http\Controllers\OrdemDeServicoController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\ServidorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/buscar/formulario',[FormularioController::class,'index']);
Route::get('/buscar/formulario/{id}',[FormularioController::class,'show']);
Route::post('/cadastro/formulario',[FormularioController::class,'store']);
Route::put('/atualizar/formulario/{id}',[FormularioController::class,'update']);
Route::delete('/deletar/formulario/{id}',[FormularioController::class,'destroy']);

Route::get('/buscar/servico',[ServicoController::class,'index']);
Route::get('/buscar/servico/{id}',[ServicoController::class,'show']);
Route::post('/cadastro/servico',[ServicoController::class,'store']);
Route::put('/atualizar/servico/{id}',[ServicoController::class,'update']);
Route::delete('/deletar/servico/{id}',[ServicoController::class,'destroy']);

Route::get('/buscar/servidor',[ServidorController::class,'index']);
Route::get('/buscar/servidor/{id}',[ServidorController::class,'show']);
Route::post('/cadastro/servidor',[ServidorController::class,'store']);
Route::put('/atualizar/servidor/{id}',[ServidorController::class,'update']);
Route::delete('/deletar/servidor/{id}',[ServidorController::class,'destroy']);

Route::get('/buscar/os',[OrdemDeServicoController::class,'index']);
Route::get('/buscar/os/{id}',[OrdemDeServicoController::class,'show']);
Route::post('/cadastro/os',[OrdemDeServicoController::class,'store']);
Route::put('/atualizar/os/{id}',[OrdemDeServicoController::class,'update']);
Route::delete('/deletar/os/{id}',[OrdemDeServicoController::class,'destroy']);

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
