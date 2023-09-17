<?php

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('proyect/{id}', [App\Http\Controllers\HomeController::class, 'proyect'])->name('proyect');
Route::post('/comprar-proyecto', [App\Http\Controllers\HomeController::class, 'store'])->name('comprar.proyecto');
Route::get('mail/{id}', [App\Http\Controllers\HomeController::class, 'mail'])->name('mail');

Auth::routes();
Route::get('/home', [App\Http\Controllers\DashboardController::class, 'home'])->name('home');
Route::get('/perfil', [App\Http\Controllers\UsersController::class, 'perfil'])->name('perfil');
Route::patch('/perfil', [App\Http\Controllers\UsersController::class, 'editar'])->name('editar.perfil');

Route::get('/empresas', [App\Http\Controllers\CompaniesController::class, 'index'])->name('companies');
Route::get('/crear-empresa', [App\Http\Controllers\CompaniesController::class, 'create'])->name('crear.empresa');
Route::post('/guardar-empresa', [App\Http\Controllers\CompaniesController::class, 'store'])->name('guardar.empresa');
Route::delete('/eliminar-empresa/{id}', [App\Http\Controllers\CompaniesController::class, 'destroy'])->name('eliminar.empresa');
Route::get('/empresa/{id}', [App\Http\Controllers\CompaniesController::class, 'show'])->name('editar.empresa');
Route::patch('actualizar-empresa/{id}', [App\Http\Controllers\CompaniesController::class, 'update'])->name('actualizar.empresa');


Route::get('/proyectos', [App\Http\Controllers\ProjectsController::class, 'index'])->name('proyectos');
Route::get('/crear-proyecto', [App\Http\Controllers\ProjectsController::class, 'create'])->name('crear.proyecto');
Route::post('/guardar-proyecto', [App\Http\Controllers\ProjectsController::class, 'store'])->name('guardar.proyecto');
Route::delete('/eliminar-proyecto/{project}', [App\Http\Controllers\ProjectsController::class, 'destroy'])->name('eliminar.proyecto');
Route::get('/proyecto/{project}', [App\Http\Controllers\ProjectsController::class, 'show'])->name('editar.proyecto');
Route::patch('actualizar-proyecto/{project}', [App\Http\Controllers\ProjectsController::class, 'update'])->name('actualizar.proyecto');
