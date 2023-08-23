<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/mascota', [App\Http\Controllers\MascotaController::class, 'viewindex']);
Route::get('/view/registrarcontrol/{id}', [App\Http\Controllers\MascotaController::class, 'registrarcontrol']);
Route::get('/view/registrarindicador/{id}', [App\Http\Controllers\MascotaController::class, 'registrarindicador']);
Route::get('/view/registrarsalud/{id}', [App\Http\Controllers\MascotaController::class, 'registrarsalud']);
Route::get('/view/registrarseguimiento/{id}', [App\Http\Controllers\MascotaController::class, 'registrarseguimiento']);
Route::get('/view/registrarveterinario/{id}', [App\Http\Controllers\MascotaController::class, 'registrarveterinario']);
// Route::post('/registrar-mascota', 'MascotaController@registrarMascota')->name('registrar-mascota');
Route::Resource('/mascotas', App\Http\Controllers\MascotaController::class);
Route::get('/mascotas/mascotasDeUsuarioAutenticado', [App\Http\Controllers\MascotaController::class, 'mascotasDeUsuarioAutenticado']);