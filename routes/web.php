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
use Illuminate\Http\Request;
use App\Product;
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
    //$products = Product::all();
    $products = Product::orderBy('created_at','desc')->get();
    return view('products.index',compact('products'));
})->name('products.index');

Route::get('products/create',function(){
    return view('products.create');
})->name('products.create');

Route::post('products',function(Request $request){
    $request->all();
    $newProduct = new Product;

    $newProduct->description = $request->input('description');
    $newProduct->price = $request->input('price');
    $newProduct->save();
    return redirect()->route('products.index')->with('info','Producto creado con exito');
})->name('products.store');

Route::delete('products/{id}',function($id){
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index')->with('info','Producto eliminado con exito');
})->name('products.destroy');