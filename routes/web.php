<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\ProductGallery;
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

// route untuk landing page
Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/details/{slug}', [LandingController::class, 'details'])->name('landing.details');
Route::get('/cart', [LandingController::class, 'cart'])->name('cart');
Route::get('/checkout/success', [LandingController::class, 'success'])->name('checkout-success');


Route::middleware(['auth:sanctum', 'verified'])->name('dashboard.')->prefix('dashboard')->group(function () {
  Route::get('/', [DashboardController::class, 'index'])->name('index');

  // hanya admin yang dapat akses
  Route::middleware(['admin'])->group(function () {
    // route product
    Route::resource('product', ProductController::class);
    // route product gallery
    Route::resource('product.gallery', ProductGalleryController::class)->shallow()->only([
      'index', 'create', 'store', 'destroy'
    ]);
    // route transaction
    Route::resource('transaction', TransactionController::class)->only([
      'index', 'update', 'show', 'edit'
    ]);
    // route user
    Route::resource('user', UserController::class)->only([
      'index', 'edit', 'update', 'destroy'
    ]);
  });
});
