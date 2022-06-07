<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MyTransactionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Models\Article;
use App\Models\Category;
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
Route::get('/product-page', [ProductController::class, 'product_page'])->name('landing.product-page');
Route::get('/article-page', [ArticleController::class, 'article_page'])->name('landing.article-page');
Route::get('/article/{articleSlug}', [ArticleController::class, 'article_single'])->name('landing.article-page.single');
Route::get('/article/category/{slug}', [CategoryController::class, 'articles'])->name('category.articles');
Route::get('/article/tag/{slug}', [TagController::class, 'articles'])->name('tag.articles');

// login required to access this route
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
  Route::get('/cart', [LandingController::class, 'cart'])->name('cart');
  Route::post('/cart/{id}', [LandingController::class, 'cartAdd'])->name('cart-add');
  Route::delete('/cart/{id}', [LandingController::class, 'cartDelete'])->name('cart-delete');
  Route::post('/checkout', [LandingController::class, 'checkout'])->name('checkout');
  Route::get('/checkout/success', [LandingController::class, 'success'])->name('checkout-success');

  // route untuk dashboard cms
  Route::name('dashboard.')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::resource('my-transaction', MyTransactionController::class)->only([
      'index', 'show'
    ]);

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

      //Articles
      Route::resource('articles', ArticleController::class);

      //Tags
      Route::resource('tags', TagController::class);

      //Categories
      Route::resource('categories', CategoryController::class);

      //CK editor Upload Images
      Route::post('/upload-image', [AdminController::class, 'uploadImagesCkeditor'])->name('ckeditor.upload');
    });
  });
});
