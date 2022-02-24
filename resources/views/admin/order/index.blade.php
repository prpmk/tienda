@extends('admin.template')

@section('content')
  <div>
    <div class="container text-center">
      <div class="page-header">
        <h1>
          <i class="fa-solid fa-cart-shopping"></i>
          PEDIDOS
        </h1>
      </div>


      <div class="panel panel-default">


      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr style="text-align:center">
              <th style="text-align:center">
                Ver detalle
              </th>
    <!--      <th style="text-align:center">
                Eliminar
              </th>                 -->
              <th style="text-align:center">
                Fecha
              </th style="text-align:center">
              <th style="text-align:center">
                Usuario
              </th>
              <th style="text-align:center">
                Subtotal
              </th>
              <th style="text-align:center">
                Envio
              </th>
              <th style="text-align:center">
                Total
              </th>
            </tr>
          </thead>
          <tbody>

            @foreach($orders as $order)
              <tr>
                <td>
                  <a href="#"
                  class="btn btn-primary btn-detalle-pedido"
                  data-id="{{ $order->id }}"
                   data-path="{{ route('admin.order.getItems') }}"
                   data-toggle="modal"
                   data-target="#myModal"
                   data-token="{{ csrf_token() }}"
                   >
                   <i class="fa fa-external-link"></i>
                 </a>
               </td>
      <!--     <td>
                  {!! Form::open(['route'=>['admin.order.destroy', $order->id]]) !!}
                  <input type="hidden" name="_method" value="DELETE">
                  <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                  </button>
                  {!! Form::close() !!}
                </td>                -->
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->user->name . " " . $order->user->last_name }}</td>
                <td>{{ number_format($order->subtotal,2) }}</td>
                <td>{{ number_format($order->shipping,2) }}</td>
                <td>{{ number_format($order->subtotal + $order->shipping,2) }}</td>
              </tr>
            @endforeach

          </tbody>
        </table>
      </div>
      </div>
      <?php echo $orders->render(); ?>
    </div>
  </div>
  @include('admin.partials.modal-detalle-pedido')
@stop
