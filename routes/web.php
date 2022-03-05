<?php

use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HorasAulaController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\TurmasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

#professores
Route::get('/', [HomeController::class, "index"]);
Route::get("/professores", [ProfessorController::class, "index"]);
Route::get("/professores/novo", [ProfessorController::class, "saveView"]);
Route::get("/professor/editar/{id}", [ProfessorController::class, "saveView"]);
Route::get("/professor/{id_professor}/aulas", [ProfessorController::class, "aulas"]);
Route::post("/professores/novo", [ProfessorController::class, "save"]);
Route::post("/professor/editar/{id}", [ProfessorController::class, "save"]);
Route::get("/professor/export/{id_professor}", [ProfessorController::class, "exportAulas"]);
#turmas
Route::get("/turmas", [TurmasController::class, "index"]);
Route::get("/turmas/nova", [TurmasController::class, "saveView"]);
Route::get("/turmas/editar/{id}", [TurmasController::class, "saveView"]);
Route::post("/turmas/nova", [TurmasController::class, "save"]);
Route::post("/turmas/editar/{id}", [TurmasController::class, "save"]);
#Horarios
Route::get("/grade/{id_turma}", [GradeController::class, "index"]);
Route::get("/grade/{id_turma}/download", [GradeController::class, "downloadExcel"]);
Route::post("/grade/save", [GradeController::class, "save"]);
Route::get("/horarios/{id_turma}", [HorasAulaController::class, "index"]);
Route::post("/horarios/{id_turma}", [HorasAulaController::class, "save"]);
