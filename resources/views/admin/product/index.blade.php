@extends('admin.template')

@section('content')
  <div>
    <div class="container text-center">
      <div class="page-header">
        <h1>
          <i class="fa-solid fa-cart-shopping"></i>
          Productos <a href="{{ route('product.create') }}" class="btn btn-warning"> <i class="fa fa-plus-circle"></i>&nbsp Agregar </a>
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
                Imagen
              </th style="text-align:center">
              <th style="text-align:center">
                Nombre
              </th>
              <th style="text-align:center">
                Extracto
              </th>
              <th style="text-align:center">
                Precio
              </th>
              <th style="text-align:center">
                Visible
              </th>
            </tr>
          </thead>
          <tbody>

            @foreach($products as $product)
              <tr>
                <td> <a href="{{ route('product.edit', $product->slug) }}" class="btn btn-primary"> <i class="fa-solid fa-pencil"></i> </a> </td>
                <td>
                  {!! Form::open(['route'=>['product.destroy', $product->slug]]) !!}
                  <input type="hidden" name="_method" value="DELETE">
                  <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                  </button>
                  {!! Form::close() !!}
                </td>
                <td> <img src="{{ $product->image }}" width="40"> </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->extract }}</td>
                <td>{{ number_format($product->price,2) }}</td>
                <td>{{ $product->visible == 1 ? "Si" : "No" }}</td>
              </tr>
            @endforeach

          </tbody>
        </table>
      </div>
      </div>
      <?php echo $products->render(); ?>
    </div>
  </div>
@stop
