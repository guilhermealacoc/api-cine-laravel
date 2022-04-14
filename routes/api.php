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

Route::Get('buscatodosfilme', [MovieController::class, 'index']);
Route::Get('buscaumfilme', [MovieController::class, 'show']);
Route::Post('cadastrafilme', [MovieController::class, 'store']);
Route::Post('atualizafilme', [MovieController::class, 'update']);
Route::Post('excluifilme', [MovieController::class, 'destroy']);
