<?php

use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\TrabajadoresController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('departamentos', DepartamentosController::class);
Route::resource('trabajadores',TrabajadoresController::class);
Route::get('trabajadoresall',[TrabajadoresController::class,'all']);
Route::get('trabajadoresdepartamentos',[TrabajadoresController::class,'TrabajadoresDepartamento']);
