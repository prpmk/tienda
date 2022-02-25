@extends('store.template')



@section('content')

<!-- incluye el slider -->
<div style="vertical-align: middle; horizontal-align: middle; text-align: middle; margin-left: middle;">
  @include('store.partials.slider')
</div>

@include ('store.partials.usuario')
<!---->

<div class="fff" style="vertical-align: middle;">
<div class="myr-5 pt-5" id="L8"> <!--  agregado por mi para un margen apertura  -->


  <!--<h1>Listado de productos</h1>-->
  <div class="container">
    <div id="products">

        @foreach($products as $product)
          <div class="product white-panel">
            <h3>{{$product -> name}}</h3><hr>
            <img src="{{$product -> image}}" width='250' style="height:200px;">
            <div class="product-info panel">
              <p>{{$product -> extract}}</p>
              <div style="vertical-align: center; text-align:center;horizontal-align:center;"><h3><span class="label label-success" >Precio: $ {{ number_format($product -> price,2) }}</span></h3></div>
              <p>

                <a class="btn btn-warning" href="{{ route('cart-add', $product -> slug) }}">
                  <i class="fas fa-cart-plus"></i>
                   &nbsp Añadir &nbsp
                </a>


                <a class="btn btn-primary" href="{{ route('product-detail', $product -> slug)}}"><i class="fas fa-chevron-circle-right"></i> &nbsp  Leer mas  </a>
              </p>
            </div>

          </div>
        @endforeach
      </div><!--  agregado por mi para un margen cierre  -->
    </div>
  </div>
  </div>
@stop
