<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HelloController;
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



Route::post('/car/create', [CarController::class, 'store'])->name('cars.store');
Route::get('/car/{car}', [CarController::class, 'show'])->name('cars.show');
Route::get('/car/', [CarController::class, 'index'])->name('cars.index');
Route::delete('/car/delete/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
Route::put('/car/update/{car}', [CarController::class, 'update'])->name('cars.update');


Route::post('/brand/create', [BrandController::class, 'store'])->name('brands.store');
Route::get('/brand/{brand}', [BrandController::class, 'show'])->name('brands.show');
Route::get('/brand/', [BrandController::class, 'index'])->name('brands.index');
Route::delete('/brand/delete/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
Route::put('/brand/update/{brand}', [BrandController::class, 'update'])->name('brands.update');
