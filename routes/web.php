<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PublicController;
 
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
//rutas get welcome y about(públicas)
Route::get('/', [PublicController::class, 'index'])->name('welcome');
//ruta single action controller
Route::get('/aboutUs', AboutController::class)->name('about');
//ruta paramétrica
Route::get('/detalle/{key}', [PublicController::class, 'detalle'])->where('name', '[A-Za-z]+')->name('detalle');


// ruta para enseñar todos los contactos
Route::get('/contacts',[ContactController::class,'index'])->name('contacts.index');
//ruta de devolución de vista
Route::get('/contacts/create', [ContactController::class,'create'])->name('contacts.create');
//ruta que guarde los datos
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');