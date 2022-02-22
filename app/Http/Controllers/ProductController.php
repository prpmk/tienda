<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests\SaveProductRequest;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('id','desc')->paginate(5);
        //dd($products);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$products = Product::orderBy('id','desc')->paginate(5);
        //dd($products);
        $categories = Category::orderBy('id','desc')->pluck('name','id');
        //dd($categories);
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProductRequest $request)
    {
        //
        $data = [
          'name'          =>  $request->get('name'),
          'slug'          =>  str_slug($request->get('name')),
          'extract'       =>  $request->get('description'),
          'description'   =>  $request->get('extract'),
          'price'         =>  $request->get('price'),
          'image'         =>  $request->get('image'),
          'visible'       =>  $request->has('visible') ? 1 : 0,
          'category_id'   =>  $request->get('category_id')
        ];
        $product = Product::create($data);
        $message = $product ? 'Producto agregado exitosamente!' : 'No fue posible agregar el producto!';
        return redirect()->route('product.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $categories = Category::orderBy('id','desc')->pluck('name','id');
        //dd($categories);
        return view('admin.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $product -> fill($request->all());
        $product -> slug = str_slug($request->get('name'));
        $product -> visible = $request->has('visible') ? 1 : 0;

        $update = $product -> save();

        $message = $update ? 'El producto fue actualizado correctamente!' : 'No fue posible realizar la actualizacion!';

        return redirect()->route('product.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $deleted = $product->delete();
        $message = $deleted ? 'Producto eliminado exitosamente!' : 'El producto no pudo ser eliminado!';
        return redirect()->route('product.index')->with('message',$message);
    }
}
