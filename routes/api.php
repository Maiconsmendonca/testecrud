<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;

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

//Listar filmes
Route::get('filmes', [FilmeController::class, 'index']);

//Listar um filme
Route::get('filme/{id}', [FilmeController::class, 'show']);

//criar novo filme
Route::post('filme', [FilmeController::class, 'store']);

//atualizar filme
Route::put('filme/{id}', [FilmeController::class, 'update']);

//Deletar Filme
Route::delete('filme/{id}', [FilmeController::class, 'destroy']);
