@extends('admin.template')

@section('content')
  <div>
    <div class="container text-center">
      <div class="page-header">
        <h1>
          <i class="fa-solid fa-cart-shopping"></i>
          Categorias <a href="{{ route('category.create') }}" class="btn btn-warning"> <i class="fa fa-plus-circle"></i>&nbsp Agregar </a>
        </h1>
      </div>


      <div class="panel panel-default">


      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr style="text-align:center">
              <th style="text-align:center">
                Editar
              </th>
              <th style="text-align:center">
                Eliminar
              </th style="text-align:center">
              <th style="text-align:center">
                Nombre
              </th>
              <th style="text-align:center">
                Descripción
              </th>
              <th style="text-align:center">
                Color
              </th>
            </tr>
          </thead>
          <tbody>

            @foreach($categories as $category)
              <tr>
                <td> <a href="{{ route('category.edit', $category) }}" class="btn btn-primary"> <i class="fa-solid fa-pencil"></i> </a> </td>
                <td>
                  {!! Form::open(['route'=>['category.destroy', $category]]) !!}
                  <input type="hidden" name="_method" value="DELETE">
                  <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                  </button>
                  {!! Form::close() !!}
                </td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->color }}</td>
              </tr>
            @endforeach

          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
@stop
