<!--  marca una extencion de un archivo    -->
@extends('store.template')
<!--  marca lo que se sobreescribira en un archivo    -->
@section('content')
<main role="main" class="ff">



      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <h2>Misión</h2>

            <div class="col-md-13" style="margin-bottom:2em;">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYczLf1RX5VWLGFP5kPBoV7o5rhmszRbivyw&usqp=CAU" alt="misión" class="img-circle" style="border: 8px solid blue;">

            </div>

            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>

            </div>
          <div class="col-md-4 text-center">
            <h2>Visión</h2>
            <div class="col-md-13" style="margin-bottom:2em;">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYczLf1RX5VWLGFP5kPBoV7o5rhmszRbivyw&usqp=CAU" alt="misión" class="img-circle" style="border: 8px solid blue;">

            </div>

            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>

          </div>
          <div class="col-4 text-center">
            <h2>Valores</h2>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYczLf1RX5VWLGFP5kPBoV7o5rhmszRbivyw&usqp=CAU" alt="misión" class="img-circle" style="border: 8px solid blue;">
            <div class="col-10">
    <div class="list-group" id="list-tab" role="tablist" style="margin-left: 8em; margin-top:2em;">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list"role="tab">Transparencia</a>
      <a class="list-group-item list-group-item-action active" id="list-profile-list" data-bs-toggle="list" role="tab">Excelencia</a>
      <a class="list-group-item list-group-item-action active" id="list-messages-list" data-bs-toggle="list" role="tab">Libertad</a>
      <a class="list-group-item list-group-item-action active" id="list-settings-list" data-bs-toggle="list" role="tab">Responsabilidad</a>
      <a class="list-group-item list-group-item-action active" id="list-messages-list" data-bs-toggle="list" role="tab">Puntualidad</a>
    </div>
  </div>

          </div>
        </div>

<div style="text-align:center; padding-top:4em;">
  <h2>Nuestra ubicaión</h2>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1881.8270426522267!2d-99.055822624329!3d19.384125126880917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1fd072c7ce2c3%3A0xdc4cffa6a7ccf6a5!2sKoi%20de%20Mexico!5e0!3m2!1ses!2smx!4v1645819707831!5m2!1ses!2smx" width="600" height="450" style="border:0; padding-top:2em;" allowfullscreen="" loading="lazy"></iframe>
</div>


        <hr>

      </div> <!-- /container -->

    </main>



<!--  marca el final de la sobreescritura    -->
@stop
