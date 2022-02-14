<!--  marca una extencion de un archivo    -->
@extends('store.template')

<!--  marca lo que se sobreescribira en un archivo    -->
@section('content')
  <div class="container text-center media">
    <div class="page-header">
      <h1><i class="fa fa-shopping-cart"></i> Carrito de compras</h1>
    </div>
    <!-- cuerpo añadido para el formato de las imagenes en el carrito-->
    <div class="table-cart">
    <!-- condicional para eliminar la tabla si es que no hay items en el carrito -->
    @if(count($cart))
      <!-- boton de vaciar carrito  -->
      <p>
        <a href="{{ route('cart-trash') }}" class="btn btn-danger">
          Vaciar carrito <i class="fa fa-trash"></i>
        </a>
      </p>

      <!-- se usan clases de bootstrap para dar formato  -->
      <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
          <!--cabecera de tabla  -->
          <thead>
            <tr>
              <th>Imagen</th>
              <th>Producto</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
              <th>Quitar</th>
            </tr>
          </thead>
          <!-- cuerpo de tabla  -->
          <tbody>
            <!--se llama a los elementos para que se cree una fila por cada elemento en el carrito -->
            @foreach($cart as $item)
              <tr>
                <td><img src="{{ $item -> image }}"</td>
                <td>{{ $item -> name }}</td>
                <td>${{ number_format($item -> price, 2) }}</td>
                <td>
                  <!-- modificacion a la linea original  -->
                  <!-- <td>{{ $item -> quantity }}</td> -->
                  <!-- para poder aumentar las catidades de productos en el carrito -->
                  <input
                          type="number"
                          min="1"
                          max="1000"
                          value="{{ $item -> quantity }}"
                          id="product_{{ $item -> id }}"
                  >

                  <a
                      href="#"
                      class="btn btn_warning btn-update-item"
                      data-href="{{ route('cart-update', $item -> slug) }}"
                      data-id="{{ $item -> id }}"
                  >
                    <i class="fa fa-refresh"></i>
                  </a>
                </td>
                <td>${{ number_format($item -> price * $item -> quantity, 2) }}</td>
                <td>
                  <a href="{{ route('cart-delete', $item -> slug) }}" class="btn btn-danger">
                    <i class="fa fa-remove"></i>
                  </a>
                </td>
              </tr>
            @endForeach
          </tbody>
        </table>
        <h3>
          <span class="label label-success">
            Total: {{ number_format($total,2) }}
          </span>
        </h3>
      </div>
      @else
        <h3><span class="label label-warning">Aun no has agregado productos</span></h3>
      @endif
      <!-- botones complementarios -->
      <hr>
        <p style="text-align:center;">
          <a href="{{ route('homen') }}"class="btn btn-primary">
            <i class="fa fa-chevron-circle-left"></i>
            Seguir comprando
          </a>

            <a href="{{ route('order-detalle') }}"class="btn btn-primary">
              Continuar
              <i class="fa fa-chevron-circle-right"></i>
            </a>
        </p>

    </div>
  </div>
<!--   -->


<!--  marca el final de la sobreescritura    -->
@end
