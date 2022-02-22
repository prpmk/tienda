@extends('admin.template')

@section('content')

  <div class="container text-center">
    <div class="page-header">
      <h1>
        <i class="fa fa-user"></i>
        USUARIOS <small>[Editar usuario]</small>
      </h1>
    </div>


    <div class="row">
      <div class="col-md-offset-3 col-md-6 panel " style="padding-top: 2%;">

        <div class="panel panel-danger">
          @if (count($errors) > 0)
            @include('admin.partials.errors')
          @endif


          {!! Form::model($user, ['route' => ['user.update', $user]]) !!}

          <input type="hidden" name="_method" value="PUT">


          <div class="form-group">
            <label class="control-label" for="name">Nombre: </label>
            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el nombre...', 'autofocus'=>'autofocus']) !!}
          </div>

          <div class="form-group">
            <label for="last_name">Apellidos: </label>

            {!! Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'Ingresa los apellidos...')) !!}
          </div>

          <div class="form-group">
            <label for="email">Correo: </label>

            {!! Form::text('email', null, array('class' => 'form-control', 'placeholder'=>'Ingresa el correo...'))  !!}
          </div>

          <div class="form-group">
            <label for="user">Usuario: </label>

            {!! Form::text('user', null, array('class' => 'form-control', 'placeholder'=>'Ingresa el nombre de usuario...'))  !!}
          </div>

          <div class="form-group">
            <label for="password">Contraseña: </label>

            {!! Form::password('password', array('class' => 'form-control'))  !!}
          </div>

          <div class="form-group">
            <label for="confirm_password">Confirmar contraseña: </label>

            {!! Form::password('password', array('class' => 'form-control'))  !!}
          </div>

          <div class="form-group">
            <label for="type">Tipo: </label>

            {!! Form::radio('type', 'user', $user->type=='user' ? true : false)  !!} User
            {!! Form::radio('type', 'admin', $user->type=='admin' ? true : false )  !!} Admin
          </div>

          <div class="form-group">
            <label for="address">Direccion: </label>

            {!! Form::textarea('address', null, array('class' => 'form-control'))  !!}
          </div>

          <div class="form-group">
            <label for="active">Activo(a): </label>

            {!! Form::checkbox('active', null, $user->active==1 ? true : false)  !!}
          </div>



          <div class="form-group">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary'])  !!}
              <a href="{{ url('user') }}" class="btn btn-warning">Cancelar </a>
          </div>
          {!! Form::close() !!}

      </div>
    </div>


    </div>

  </div>

@stop
