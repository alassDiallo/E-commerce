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
    return redirect()->route('produits.index');
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/panier/ajouter','CartController@store')->name('cart.store');
    Route::delete('/panier/{rowId}','CartController@destroy')->name('cart.destroy');
    Route::get('/panier','CartController@index')->name('cart.index');
});

Route::get('/recherche','ControllerProduits@recherche')->name('produits.recherche');
Route::resource('produits','ControllerProduits');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
//Les routes de payements
Route::get('/payement','ControllerPayement@index')->name('payement.index');
