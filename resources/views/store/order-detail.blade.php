@extends('store.template')

@section('content')
  <div class="container text-center ini">
    <div class="page-header">
      <h1>
        <i class="fa fa-shopping-cart"></i>
        Detalle del pedido
      </h1>
    </div>

    <div class="page">
      <div class="panel panel-default table-responsive">
        <h3>
          Datos del usuario
        </h3>
        <table class="table table-striped table-hover table-bordered">
          <tr>
            <td>Nombre:</td><td>{{ Auth::user()->name . " " . Auth::user()->last_name }}</td>
          </tr>
          <tr>
            <td>Usuario:</td><td>{{ Auth::user()->user }}</td>
          </tr>
          <tr>
            <td>Correo:</td><td>{{ Auth::user()->email }}</td>
          </tr>
          <tr>
            <td>Dirección:</td><td>{{ Auth::user()->address }}</td>
          </tr>

        </table>
      </div>
      <div class="panel panel-default table-responsive">
        <h3>Datos del pedido</h3>
        <table class="table table-striped table-hover table-bordered">
          <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
          </tr>
          @foreach($cart as $item)
            <tr>
              <th>{{ $item->name }}</th>
              <th>{{ number_format($item->price,2) }}</th>
              <th>{{ $item->quantity }}</th>
              <th>{{ number_format($item->price * $item->quantity,2) }}</th>
            </tr>
          @endforeach
        </table>

        <hr>
        <h3>
          <span class="label label-success">
            Total: ${{ number_format($total,2) }}
          </span>
        </h3>
        <hr>
        <div class="row w-100 justify-content-center align-items-center">
          <a href="{{ route('cart-show') }}" class="btn btn-primary fa-2x">
            <i class="fa fa-chevron-circle-left"></i>
            Regresar
          </a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <a href="{{ route('payment') }}" class="btn btn-primary fa-brands fa-cc-paypal fa-2x">
            Pagar con  paypal
          </a>

      </div>
    </div>

  </div>
@stop
