<?php

use App\Http\Controllers\AuthController;
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



Route::group(
    ['middleware'=>['auth:sanctum']],function(){
Route::get('/buscar/formulario/servico',[FormularioController::class,'formForServico']);
Route::get('/buscar/formulario/servico/{id}',[FormularioController::class,'formForServicoOfId']);

Route::get('/buscar/formulario/servidor',[FormularioController::class,'formCreateForServidor']);
Route::get('/buscar/formulario/servidor/{id}',[FormularioController::class,'formCreateForMy']);

Route::get('/buscar/formulario/resolvido',[FormularioController::class,'formResolved']);
Route::get('/buscar/formulario/naoresolvido',[FormularioController::class,'formnotResolved']);

Route::post('/formulario/resolvendo/{id}',[FormularioController::class,'Resolved']);

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

Route::post('/logout',[AuthController::class,'logout']);
}
);

Route::post('/registro', [AuthController::class, 'register']);
Route::post('/login',[AuthController::class,'login']);

