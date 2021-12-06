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

Route::get('/admin/products', [App\Http\Controllers\ProductController::class, 'index']);
Route::post('/admin/products/create', [App\Http\Controllers\ProductController::class, 'create']);
Route::post('/admin/products', [App\Http\Controllers\ProductController::class, 'store']);
