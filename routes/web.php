<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', function () {
//     return view('homePage');
// });

Route::get('/', 'PageController@getProduct');
Route::get('/productDetail/{id}', 'PageController@productDetail');
Route::get('addProduct','PageController@addProduct');
Route::post('/addProductAction', 'PageController@addProductAction');
Route::get('/deleteProduct/{id}','PageController@deleteProduct');
// Route::get('add-product', function() { return view('includes.products.addProduct'); });