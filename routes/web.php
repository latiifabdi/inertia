<?php

use App\Product;
use Inertia\Inertia;

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

Route::get("/api/products", function() {
    return Product::all();
})->middleware('cors');


Route::get("/api/products/{id}", function($id) {
    return Product::findOrFail($id);
})->middleware('cors');


Route::get("/", "WelcomeController@index");

Route::get('/collection/all', 'CollectionController@index');

Route::get('/products/{product}', 'ProductController@show');

Route::get('/carts', 'CartsController@index');

Route::get("/carts/{product}", "CartsController@store");


Route::get('/contact', function () {
    return Inertia::render('Contact');
});


Route::get("/checkout", "CheckoutController@index");

Route::post("/checkout", "CheckoutController@store");
