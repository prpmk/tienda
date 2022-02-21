<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
<!--  <nav class="navbar navbar-expand-lg navbar-light bg-light">  -->
  <div class="container-fluid">
    <!--<img src="https://i0.wp.com/www.jacobsoft.com.mx/wp-content/uploads/2019/04/Bootstrap-Logo.png?ssl=1" alt="" width="30" height="24"> -->
    <!-- <a class="navbar-brand main-title" href="{{ route('home') }}">Monroy's Kingdom</a>  -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
      <span class="navbar-text">
      <i class="fa fa-dashboard"></i>&nbsp Dashboard
      </span>
        <!--    -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href='#'>Categorias</a></li>
          <li><a href='#'>Productos</a></li>
          <li><a href='#'>Pedidos</a></li>
          <li><a href='#'>Usuarios</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>&nbsp {{ Auth::user()->user }}</a>
            <div class="dropdown-menu text-center">


                <i class="fa fa-user"></i>

                <a class="dropdown-item" href="#" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                   Cerrar sesión
                </a>
                  <!-- formulario para cerrar sesion el cual es invisible -->
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>


            </div>
          </li>
      </ul>
    </div>
  </div>


</nav>
