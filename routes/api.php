<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\MovieController;

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


Route::prefix('filmes')->group(function () {
    Route::get('buscatodos', [MovieController::class, 'index']);
    Route::get('busca/{id}', [MovieController::class, 'show']);
    Route::post('cadastra', [MovieController::class, 'store']);
    Route::put('atualiza/{id}', [MovieController::class, 'update']);
    Route::delete('exclui/{id}', [MovieController::class, 'destroy']);
});