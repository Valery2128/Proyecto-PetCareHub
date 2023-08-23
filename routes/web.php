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
Route::post('/registrarindicador', [App\Http\Controllers\MascotaController::class, 'indicadorsaludstore']);


Route::get('/view/registrarsalud/{id}', [App\Http\Controllers\MascotaController::class, 'registrarsalud']);
Route::post('/registrarsalud', [App\Http\Controllers\MascotaController::class, 'registrarsaludstore']);

Route::get('/view/reportes/{id}', [App\Http\Controllers\MascotaController::class, 'reportes']);

Route::get('/view/registrarseguimiento/{id}', [App\Http\Controllers\MascotaController::class, 'registrarseguimiento']);

Route::get('/view/registrarveterinario/{id}', [App\Http\Controllers\MascotaController::class, 'registrarveterinario']);
Route::post('/registrarveterinario', [App\Http\Controllers\MascotaController::class, 'registrarveterinariostore']);

// Route::post('/registrar-mascota', 'MascotaController@registrarMascota')->name('registrar-mascota');
Route::Resource('/mascotas', App\Http\Controllers\MascotaController::class);
Route::get('/mascotas/mascotasDeUsuarioAutenticado', [App\Http\Controllers\MascotaController::class, 'mascotasDeUsuarioAutenticado']);use Barryvdh\DomPDF\Facade as PDF;



