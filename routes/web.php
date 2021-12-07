<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Faker\Factory;
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

//Example factory
/*Route::get('/fakertest', function () {
    $faker = Factory::create();
    $limit = 10;
    for ($i = 0; $i < $limit; $i++) {
        echo nl2br('Name: ' . $faker->name . ', Email Address: ' . $faker->unique()->email . ', Contact No: ' . $faker->phoneNumber . "\n");
    }
});*/

Route::get('/', [App\Http\Controllers\TestController::class, 'welcome'])->name('home');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
//Con el prefijo admin evitamos agregar admin a todas las rutas
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']); //Listar
    Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create']); //Formulario
    Route::post('/products', [App\Http\Controllers\ProductController::class, 'store']); //Registrar

    Route::get('/products/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit']); //Form edicion
    Route::post('/products/{id}/edit', [App\Http\Controllers\ProductController::class, 'update']); //actualizar
    Route::delete('/products/{id}', [App\Http\Controllers\ProductController::class, 'destroy']); //eliminar
    //PUT PATCH DELETE
    Route::get('/products/{id}/images', [App\Http\Controllers\ImageController::class, 'index']); //listado
    Route::post('/products/{id}/images', [App\Http\Controllers\ImageController::class, 'store']); //Registrar
    Route::delete('/products/{id}/images', [App\Http\Controllers\ImageController::class, 'destroy']); //eliminar
    
});
