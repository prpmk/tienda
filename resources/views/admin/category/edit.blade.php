@extends('admin.template')

@section('content')

  <div class="container text-center">
    <div class="page-header">
      <h1>
        <i class="fa-solid fa-cart-shopping"></i>
        CATEGORIAS <small>[Editar categoria]</small>
      </h1>
    </div>


    <div class="row">
      <div class="col-md-offset-3 col-md-6 panel " style="padding-top: 2%;">

        <div class="panel panel-danger">
          @if (count($errors) > 0)
            @include('admin.partials.errors')
          @endif


          {!! Form::model($category, ['route' => ['category.update', $category]]) !!}

          <input type="hidden" name="_method" value="PUT">

          <div class="form-group">
            <label for="name">Nombre: </label>

            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el nombre...', 'autofocus' => 'autofocus']) !!}
          </div>

          <div class="form-group">
            <label for="description">Descripción: </label>

            {!! Form::textarea('description', null, ['class' => 'form-control'])  !!}
          </div>

          <div class="form-group">
            <label for="color">Color: </label>
            <input type="color" name="color" class="form-control" value="{{ isset($category->color) ? $category->color : null }}">
          </div>
          <div class="form-group">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary'])  !!}
              <a href="{{ url('category') }}" class="btn btn-warning">Cancelar </a>
          </div>
          {!! Form::close() !!}

      </div>
    </div>


    </div>

  </div>

@stop
