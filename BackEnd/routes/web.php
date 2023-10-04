<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/",[CrudController::class,"index"])->name("crud.index");

//Ruta para crear usuario
Route::post("/registrar-usuario",[CrudController::class,"create"])->name("crud.create");

//ruta modificar datos
Route::post("/modificar-usuario",[CrudController::class,"update"])->name("crud.update");

//Ruta para eliminar usuarios
Route::get("/eliminar-usuario-{NombreUsuario}",[CrudController::class,"delete"])->name("crud.delete");
