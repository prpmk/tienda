@extends('store.template')

<div class="media">


@section('content')
<div class="container">
</div>
  <div class="page-header">
    <h1><i class="fa fa-shopping-cart"></i> Detalle del producto</h1>
  </div>

  <div class="row">
      <div class="col-md-6">
        <div class="product-block">
          <img src="{{ $product -> image}}">
        </div>
      </div>
      <div class="col-md-6">
        <div class="product-block">
          <h3>{{ $product -> name}}</h3><hr>
          <div class="product-info panel">
            <p>{{ $product -> description}}</p>
            <h3><span class="label label-success" >Precio: $ {{ number_format($product -> price,2) }}</span></h3>
            <p>


              <a class="btn btn-warning btn-block" href="{{ route('cart-add', $product -> slug) }}">
                <font size=5> &nbsp Añadir &nbsp</font>
                <i class="fas fa-cart-plus fa-2x"></i>
              </a>


            </p>
          </div>
        </div>
      </div>
  </div>

<hr>

<p>

    <div style="vertical-align: center; text-align:center;horizontal-align:center;"><a class="btn btn-primary" href="{{ route('homen') }}"><i class="fas fa-chevron-circle-left"></i>Regresar
  </a></div>
</p>
</div>


</div>
@stop
