<?php

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
//fetch
Route::get('/fetch',[\App\Http\Controllers\FetchController::class,'fetch']);


//auth
Route::get('/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('/login',[\App\Http\Controllers\AuthController::class,'loginPost'])->name('loginPost');
Route::get('/Logout',[\App\Http\Controllers\AuthController::class,'Logout'])->name('Logout');



// Front routes
Route::get('/',[\App\Http\Controllers\HomepageController::class,'index'])->name('Homepage');
Route::get('/shop',[\App\Http\Controllers\HomepageController::class,'shop'])->name('shop');

//cart
Route::get('/cart',[\App\Http\Controllers\CartController::class,'cart'])->name('cart');
Route::post('/add-to-cart',[\App\Http\Controllers\CartController::class,'addToCart'])->name('add-to-cart');
//Route::get('/cart-delete',[\App\Http\Controllers\CartController::class,'cartDelete'])->name('cart_delete');
Route::resource('/carts',\App\Http\Controllers\CartController::class);



// Admin routes
Route::get('/admin',[\App\Http\Controllers\Admin\ProductController::class,'admin'])->name('admin');
Route::resource('products',\App\Http\Controllers\Admin\ProductController::class);



//brands
Route::get('/brands',[\App\Http\Controllers\BrandController::class,'brands'])->name('brands');
Route::get('/brand/{brands}',[\App\Http\Controllers\BrandController::class,'brand'])->name('brand');


// orders
Route::get('/order',[\App\Http\Controllers\OrderController::class,'order'])->name('order');
Route::post('/order_place',[\App\Http\Controllers\OrderController::class,'order_place'])->name('order_place');
