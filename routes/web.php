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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', 'StoreController@index');

//vincular para inyeccion de dependencias
//se ocupara para el carrito ya que este hace varias funciones en base al slug
Route::bind('product', function ($slug) {
  return App\Product::where('slug', $slug) -> first();
});
//Route::bind('user', function ($value) {
  //      return App\User::where('name', $value)->first() ?? abort(404);
    //});


Route::get('/',[
  'as' => 'home',
  'uses' =>'StoreController@index'
  ]);
Route::get('product/{slug}',[
  'as' => 'product-detail',
  'uses' => 'StoreController@show'
]);

// carrito
route::get('cart/show',[
  'as' => 'cart-show',
  'uses' => 'Cartcontroller@show'
]);


//peticion para agregar item al carrito
Route::get('cart/add/{product}', [
  'as' => 'cart-add',
  'uses' => 'Cartcontroller@add'
]);

//peticion para eliminar un item del carrito
Route::get('cart/delete/{product}', [
  'as' => 'cart-delete',
  'uses' => 'Cartcontroller@delete'
]);

//peticion para vaciar el carrito
Route::get('cart/trash', [
  'as' => 'cart-trash',
  'uses' => 'Cartcontroller@trash'
]);

//peticion para refrescar el carrito
//Route::get('cart/update/{product}/quantity', [
//la siguente linea corrigio el problema de identificacion de ruta
Route::get('cart/update/{product}/{quantity?}', [
  'as' => 'cart-update',
  'uses' => 'Cartcontroller@update'
]);
