<?php

use Gloudemans\Shoppingcart\Facades\Cart;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/boutique', 'App\Http\Controllers\ProductController@index')->name('products.index');
Route::get('/boutique/{slug}', 'App\Http\Controllers\ProductController@show')->name('products.show');


/*Cart route */
Route::get('/panier', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/panier/ajouter', 'App\Http\Controllers\CartController@store')->name('cart.store');
Route::delete('/panier/{rowId}', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');
Route::get('/videpanier', function(){
    Cart::destroy();
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
