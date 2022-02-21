<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        // linea de comando de herramienta de debug ideal para hacer pruebas de lectura
        //dd($categories);

        return view('admin.category.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return $request->all();
        $this->validate($request, [
              'name'=>'required|unique:categories|max:255',
              'color'=> 'required'
        ]);

        $category=Category::create([
          'name'=>$request->get('name'),
          'slug'=>str_slug($request->get('name')),
          'description'=>$request->get('description'),
          'color'=>$request->get('color')
        ]);

        $message = $category ? 'Categoria agregada correctamente!' : 'La categoria no pudo ser agregada!';

        return redirect()->route('category.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        return $category;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $category -> fill($request->all());
        $category -> slug = str_slug($request -> get('name'));

        $update = $category -> save();

        $message = $update ? 'Categoria actualizada correctamente!' : 'No fue posible actualizar la categoria!';

        return redirect()->route('category.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $deleted = $category->delete();

        $message = $deleted ? 'Categoria eliminada exitosamente!' : 'La categoria no pudo ser eliminada!';

        return redirect()->route('category.index')->with('message', $message);
        //return $category;
    }
}
