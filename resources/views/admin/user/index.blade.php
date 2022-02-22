@extends('admin.template')

@section('content')
  <div>
    <div class="container text-center">
      <div class="page-header">
        <h1>
          <i class="fa-solid fa-user"></i>
          Usuarios <a href="{{ route('user.create') }}" class="btn btn-warning"> <i class="fa fa-plus-circle"></i>&nbsp Agregar </a>
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
              </th style="text-align:center">
              <th style="text-align:center">
                Apellidos
              </th>
              <th style="text-align:center">
                Correo
              </th>
              <th style="text-align:center">
                Tipo
              </th>
              <th style="text-align:center">
                Activo
              </th>
            </tr>
          </thead>
          <tbody>

            @foreach($users as $user)
              <tr>
                <td> <a href="{{ route('user.edit', $user) }}" class="btn btn-primary"> <i class="fa-solid fa-pencil"></i> </a> </td>
                <td>
                  {!! Form::open(['route'=>['user.destroy', $user]]) !!}
                  <input type="hidden" name="_method" value="DELETE">
                  <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                  </button>
                  {!! Form::close() !!}
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->user }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->type }}</td>
                <td>{{ $user->active == 1 ? "Si" : "No" }}</td>
              </tr>
            @endforeach

          </tbody>
        </table>
      </div>
      </div>
      <?php echo $users->render(); ?>
    </div>
  </div>
@stop
