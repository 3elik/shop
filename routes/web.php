<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', IndexController::class)->name('index');

Route::get('/catalog/index', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalog/category/{slug}', [CatalogController::class, 'category'])->name('catalog.category');
Route::get('/catalog/brand/{slug}', [CatalogController::class, 'brand'])->name('catalog.brand');
Route::get('/catalog/product/{slug}', [CatalogController::class, 'product'])->name('catalog.product');

Route::get('/basket/index', [BasketController::class, 'index'])->name('basket.index');
Route::get('/basket/checkout', [BasketController::class, 'checkout'])->name('basket.checkout');
Route::post('/basket/add/{id}', [BasketController::class, 'add'])->where('id', '[0-9]+')->name('basket.add');
Route::post('/basket/increase/{id}', [BasketController::class, 'increase'])->where('id', '[0-9]+')->name('basket.increase');
Route::post('/basket/decrease/{id}', [BasketController::class, 'decrease'])->where('id', '[0-9]+')->name('basket.decrease');
Route::post('/basket/remove/{id}', [BasketController::class, 'remove'])->where('id', '[0-9]+')->name('basket.remove');
Route::post('/basket/clear', [BasketController::class, 'clear'])->name('basket.clear');

Route::name('user.')->prefix('user')->group(function () {
    Route::get('index', [UserController::class, 'index'])->name('index');
    Auth::routes();
});
