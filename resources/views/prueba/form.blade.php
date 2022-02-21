<h1>Hola</h1>
<p>Esto es una pprueba para conocer laravel colective</p>

{{ Form::open(array('url' => 'foo/bar')) }}
    Form::text('email', 'example@gmail.com');
{{ Form::close() }}


<p>prueba 2</p>








{!! Form::open(['url' => 'foo/bar']) !!}

    {!! Form::text('email', 'example@gmail.com') !!}

{!! Form::close() !!}
