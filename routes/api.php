<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CombustivelController;
use App\Http\Controllers\GasCarbonicoEmitidoController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\InformativoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post("login", [UserController::class, 'login']);

Route::resources([
    'combustivels' => CombustivelController::class,
    'users' => UserController::class,
    'gasCarbonicos' => GasCarbonicoEmitidoController::class,
    'historicos' => HistoricoController::class,
    'informativos' => InformativoController::class,
]);

