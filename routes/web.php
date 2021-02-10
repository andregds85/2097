<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\soudohospital;



Route::get('/', function () {
    return view('home');
});



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('pacientes', PacienteController::class);
    Route::resource('hospital', HospitalController::class);
    Route::resource('soudohospital', soudohospital::class);

   
    Route::get('import_exportpacie', 'App\Http\Controllers\Import_Export_ControllerPacie@importExport');
    Route::post('importpacie', 'App\Http\Controllers\Import_Export_ControllerPacie@import');
    Route::get('exportpacie', 'App\Http\Controllers\Import_Export_ControllerPacie@export');

    Route::get('import_export', 'App\Http\Controllers\Import_Export_Controller@importExport');
    Route::post('import', 'App\Http\Controllers\Import_Export_Controller@import');
    Route::get('export', 'App\Http\Controllers\Import_Export_Controller@export');
    
});

