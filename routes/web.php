<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegistrosController;
use App\Http\Controllers\TratamientosController;



Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'store']);

Route::get('/crear-cuenta',[RegisterController::class, 'index'] )->name('register');
Route::post('/crear-cuenta',[RegisterController::class, 'store'] );

Route::get('/cambiar_password',[PasswordController::class, 'index'] )->name('password');
Route::post('/cambiar_password',[PasswordController::class, 'store'] );

Route::post('/logout',[LogoutController::class, 'store'] )->name('logout');


Route::get('/perfil/{usuario:apellidos}', [PerfilController::class, 'show'])->name('perfil.show');
Route::get('/perfil/{usuario:apellidos}/editar', [PerfilController::class, 'edit'])->name('perfil.editar');


Route::delete('/registros/{registro:id}', [RegistrosController::class, 'destroy'])->name('registros.destroy');
Route::patch('/registros/{registro:id}', [RegistrosController::class, 'update'])->name('registros.update');
Route::get('/registros/{registro:id}/edit', [RegistrosController::class, 'edit'])->name('registros.editar');


Route::get('/tratamientos/create/{usuario:apellidos}', [TratamientosController::class, 'create'])->name('tratamientos.create');

Route::put('/tratamientos/{tratamiento}', [TratamientosController::class, 'update'])->name('tratamientos.update');

Route::delete('/tratamientos/{tratamiento:id}', [TratamientosController::class, 'destroy'])->name('tratamientos.destroy');

Route::get('/tratamientos/{tratamiento:id}/edit', [TratamientosController::class, 'edit'])->name('tratamientos.editar');





Route::patch('{usuario:apellidos}/actualizar', [PerfilController::class, 'update'])->name('perfil.update');




Route::get('/{usuario:apellidos}/registros', [RegistrosController::class, 'create'])->name('registros.create');
Route::post('/{usuario:apellidos}/registros', [RegistrosController::class, 'store'])->name('registros.store');


Route::post('/{usuario:apellidos}/tratamientos', [TratamientosController::class, 'store'])->name('tratamientos.store');



























// Route::get('/{usuario:apellidos}/tratamientos', [TratamientosController::class, 'show'])->name('tratamiento.show');


