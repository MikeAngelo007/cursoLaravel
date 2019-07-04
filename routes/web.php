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

Route::get('/', function () {
    return view('root');
});

/* Route::get('/',function(){
    return 'Esta es la URL raiz';
});
Route::post('/',function(){
    return 'URL metodo post';
}); */

Route::get('products',function(){
    return view('products.index');
})->name('products.index');

Route::get('products/create',function(){
    return view('products.create');
})->name('products.create');