<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Models\Product;
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
Route::resource('product','AjaxController');
//Route::get('/product', 'App\Http\Controllers\AjaxController@index') ->name('product');
// Route::resource('/products', [App\Http\Controllers\AjaxController::class, 'index'])->name('product'); 
//Route::resource('/index',  [App\Http\Controllers\AjaxController::class, 'index'])->name('product');
//Route::resource('/product', [App\Http\Controllers\AjaxController::class, 'store']);
//Route::get('save',[AjaxController::class,'store'])->name('product-submit');
//Route::resource('products','AjaxController');


// Route::resource('/product', function () {
//     $links = Product::all();
//     return view('product')->with('product', $links);
// });