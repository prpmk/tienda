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
//use App\Category;
//use App\Http\Controllers\Admon\CategoryController;
//use Illuminate\Support\Facades\Route;

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
//insercion de dependencia category
Route::bind('category', function($category){
  return App\Category::find($category);
});


//insercion de dependencia user
Route::bind('user', function($user){
return App\User::find($user);
});


Route::get('/',[
  'as' => 'homen',
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//ruta del middleware
Route::get('order-detail', [
  'middleware' => 'auth',
  'as' => 'order-detalle',
  'uses' => 'Cartcontroller@orderDetail'
]);




// PAYPAL

//enviamos pedido a paypal
Route::get('payment', array(
  'as' => 'payment',
  'uses' => 'PaypalController@postPayment',
));
//Paypal redirecciona a esta ruta
Route::get('payment/status', array(
  'as' => 'payment.status',
  'uses' => 'PaypalController@getPaymentStatus',
));



//admin----

//Route::resource('admin/category', 'Admin\CategoryController');
//Route::resource('admin/category/create', 'Admin\CategoryController@create');
//Route::resource('/admin', 'CategoryController@create');
//Route::resource('/admin', 'CategoryController@store');
//Route::resource('admin/categori', 'Admin\CategoriController');
//Route::resource('/admin/category',[CategoryController::class, 'create']);

Route::resource('category', 'CategoryController');
//Route::get('category', 'CategoryController@index');
Route::resource('product', 'ProductController');
//Route::get('/product/{slug}', ['uses' => 'ProductController@create','as' => 'product.create']);
//Route::get('/product/{product}/update', ['uses' => 'ProductController@update','as' => 'product.update']);
Route::resource('user', 'UserController');
Route::get('orders', array(
'as'=>'order.index',
'uses'=>'OrderController@index',
));
Route::post('admin/order/get-items', [
  'as'=> 'admin.order.getItems',
  'uses'=> 'OrderController@getItems'
]);
//Route::get('order/{id}', array(
//'as'=>'admin.order.destroy',
//'uses'=>'OrderController@destroy',
//));
Route::get('order/{id}', [
  'as'=>'admin.order.destroy',
  'uses'=> 'OrderController@destroy'
]);
//si funcionan almenos para llamar
//Route::get('admin/index', [ 'uses' => 'CategoryController@index', 'as' => 'index' ]); //Route::resource('users','CategoryController');
//Route::get('admin/create', array( 'uses' => 'CategoryController@create', 'as' => 'creacion' )); //Route::resource('users','CategoryController');
//Route::post('admin/store', [ 'uses' => 'CategoryController@store', 'as' => 'store' ]);
//Route::resource('admin/category','Admin\CategoryController');

//Route::any('admin/category/create', 'Admin\CategoryController@create');
//Route::post('admin/category/create', 'Admin\CategoryController@store');
//Route::group(['namespace' => 'Admin'], function()
//{
    //rutas dentro de admin
//    Route::get('admin/category', 'CategoryController@index');
//    Route::get('admin/category/create', 'CategoryController@create');
//    Route::post('admin/category', 'CategoryController@store');
    //Route::get('admin/category', 'CategoryController@show');
    //Route::get('admin/category', 'CategoryController@edit');
    //Route::get('admin/category', 'CategoryController@update');
//});





//Route::get('users/{id_usuario}/destroy', [ 'uses' => 'UsersController@destroy', 'as' => 'admin.users.destroy' ]); Route::resource('users','Userscontroller');

//Route::resource('admon/category', 'Admon\CategoriController');
//Route::resource('Admon/category', 'Admon\CategoriController');
//Route::get('Admon/category/create',function(){
//  return view('admon.category.create');
//});
//Route::resource();
//Route::resource('Admin/category', 'admin\CategoryController');



//home del admin
//Route::get('admin/home', function(){
//  return view('admin.home');
//});
Route::get('admin/homes',function(){
  return view('admin.homes');
});


//products
//Route::resource('product', 'ProductController');




//prueba
Route::get('formulario', function(){
  return view('prueba.form');
});
