@extends('admin.template')

@section('content')

  <div class="container text-center">
    <div class="page-header">
      <h1>
        <i class="fa-solid fa-cart-shopping"></i>
        PRODUCTOS <small>[Editar productos]</small>
      </h1>
    </div>


    <div class="row">
      <div class="col-md-offset-3 col-md-6 panel " style="padding-top: 2%;">

        <div class="panel panel-danger">
          @if (count($errors) > 0)
            @include('admin.partials.errors')
          @endif


          {!! Form::model($product, ['route' => ['product.update', $product->slug]]) !!}

          <input type="hidden" name="_method" value="PUT">

          <div class="form-group">
            <label class="control-label" for="category">Categoía</label>
            {!! Form::select('categoria_id', $categories, null, ['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
            <label for="name">Nombre: </label>

            {!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Ingresa el nombre...', 'autofocus' => 'autofocus')) !!}
          </div>

          <div class="form-group">
            <label for="extract">Extracto: </label>

            {!! Form::text('extract', null, array('class' => 'form-control', 'placeholder'=>'Ingresa el estracto...'))  !!}
          </div>

          <div class="form-group">
            <label for="description">Descripción: </label>

            {!! Form::textarea('description', null, array('class' => 'form-control'))  !!}
          </div>

          <div class="form-group">
            <label for="price">Precio: </label>

            {!! Form::text('price', null, array('class' => 'form-control', 'placeholder'=>'Ingresa el precio...'))  !!}
          </div>

          <div class="form-group">
            <label for="image">Imagen: </label>

            {!! Form::text('image', null, array('class' => 'form-control', 'placeholder'=>'Ingresa la url de la imagen...'))  !!}
          </div>

          <div class="form-group">
            <label for="visible">Visible: </label>
            <input type="checkbox" name="visible" {{ $product->visible == 1 ? "checked='checked'" : '' }}>
          </div>

          <div class="form-group">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary'])  !!}
              <a href="{{ url('product') }}" class="btn btn-warning">Cancelar </a>
          </div>
          {!! Form::close() !!}

      </div>
    </div>


    </div>

  </div>

@stop
