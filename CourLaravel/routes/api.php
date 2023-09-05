<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\FizzBuzz;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', [HelloController::class, 'index'])->name('hello.index');

Route::get('/brand/', [BrandController::class, 'index'])->name('brands.index');
Route::get('/brand/{brand}', [BrandController::class, 'show'])->name('brands.show');
Route::post('/brand/create', [BrandController::class, 'store'])->name('brands.store');
Route::delete('/brand/delete/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
Route::put('/brand/update/{brand}', [BrandController::class, 'update'])->name('brands.update');

Route::get('/car/', [CarController::class, 'index'])->name('cars.index');
Route::get('/car/{car}', [CarController::class, 'show'])->name('cars.show');
Route::post('/car/create', [CarController::class, 'store'])->name('cars.store');
Route::delete('/car/delete/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
Route::put('/car/update/{car}', [CarController::class, 'update'])->name('cars.update');

Route::get('/option/', [OptionController::class, 'index'])->name('options.index');
Route::post('/option/create', [OptionController::class, 'store'])->name('options.store');

Route::post('/product/create', [ProductController::class, 'store'])->name('products.store');
Route::get('/product/', [ProductController::class, 'index'])->name('products.index');
Route::put('/product/update/{product}', [ProductController::class, 'update'])->name('products.update');
Route::get('/product/byname/{search}', [ProductController::class, 'byname'])->name('products.byname');

Route::post('/product/search', [ProductController::class, 'search'])->name('products.search');



Route::get('/fizzbuzz/{action}', [FizzBuzz::class, 'index'])->name('fizzbuzz');
