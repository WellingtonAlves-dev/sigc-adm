<?php

use App\Http\Controllers\HorasAulaController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\TurmasController;
use App\Models\Professores;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
# PROFESSORES
Route::get("professores", [ProfessorController::class, "getAll"]);
Route::get("professores/{id}", [ProfessorController::class, "getOne"]);
Route::post("professores", [ProfessorController::class, "save"]);
Route::put("professores/{id}", [ProfessorController::class, "save"]);
# TURMAS
Route::get("turmas", [TurmasController::class, "get"]);
Route::get("turmas/{id}", [TurmasController::class, "get"]);
Route::post("turmas", [TurmasController::class, "save"]);
Route::put("turmas/{id}", [TurmasController::class, "save"]);
# HORARIOS AULAS
Route::get("horasaulas/{id_turma}", [HorasAulaController::class, "get"]);
Route::post("horasaulas/{id_turma}", [HorasAulaController::class, "save"]);
Route::put("horasaulas/{id_turma}/{id}", [HorasAulaController::class, "save"]);
Route::delete("horasaulas/{id}", [HorasAulaController::class, "delete"]);