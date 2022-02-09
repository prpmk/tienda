<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

class StoreController extends Controller
{
    //
    public function index () {
      $products = product::all();
      // dd es para mostrar en el explorador lo que contiene la bd en forma de codigo
      //dd($products);
      return view('store.index', compact('products'));
      //return "hola mundo!!";
    }

    public function show ($slug) {
      //$user = DB::table('users')->where('name', 'John')->first();
      //$product = Product::where('slug, $slug');
      $product = Product::where('slug', $slug)->first();
      //dd($product);
      return view('store.show', compact('product'));
    }

}
