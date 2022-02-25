<div class="hola">
<div class="container-fluid">
  <div class="row">
      <div class="col-md-4">
        <h3>Mapa del sitio</h3>
        <p> <a href="{{ url('saludo') }}" style="text-decoration:none; color: black;"> Nosotros</a> </p>
        <p> <a href="{{ url('contacto') }}" style="text-decoration:none; color: black;">Contacto</a> </p>
        <p> <a href="{{ route('homen') }}" style="text-decoration:none; color: black;">Inicio</a> </p>
        <p> <a href="{{ route('login') }}" style="text-decoration:none; color: black;">Inicio de sesión</a> </p>
      </div>
      <div class="col-md-4">
        <h3>Desarrolado para:</h3>
        <div class="autor-info">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYczLf1RX5VWLGFP5kPBoV7o5rhmszRbivyw&usqp=CAU" alt="" class="avatar">
          <p>monros una empresa de manofactura de ropa caracterizada por su ropa de alta calidad y su gran capacidad de cumplimiento siempre dispuestos a dar su mejor desemepeño para la satisaccion del cliente</p>
        </div>
      </div>
      <div class="col-md-4">
        <h3>Siguenos</h3>
        <ul class="redes">
          <li>
            <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
          </li>
          <li>
            <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
          </li>
          <li>
            <a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
          </li>
          <li>
            <a href="#"><i class="fab fa-youtube fa-2x"></i></a>
          </li>
        </ul>
        <h3>Escribenos</h3>
        <i class="fas fa-at"><a href="{{ url('/contacto') }}">proyectoRP@protonmail.com</a></i>
      </div>
  </div>
</div>
</div>
