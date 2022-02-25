@auth

  <h1 style="align-self: center; text-align: center; align-items: center;">Bienvenido </h1>
  <h2 style="align-self: center; text-align: center; align-items: center;"> {{auth()->user()->name}}</h2>
  <h4 style="align-self: center; text-align: center; align-items: center;">Apreciamos tu preferencia</h4>
@endauth

<!--<p>
       verificar, es para ver el nombre del usuario
      {{ auth()->user() }}</p>
      @auth
      <p>hola wey</p>

<p>{{ auth()->user()->type }}</p>
@if( (auth()->user()->type)=='admin' )
<p>funciona</p>
@else
<p>no funciona</p>
@endif


@if ((auth()->user()->type)=='admin')
    eres admin
@elseif ((auth()->user()->type)=='user')
    eres usuario
@else
    que pedo??
@endif






      @endauth
      <p>
             verificar, es para ver el nombre del usuario
            {{ session('status') }}</p>


          -->
