@extends('store.template')

@section('content')

<div class="ini container" style="text-align:center; ">


<form action="php" method="post" name="contacto" id ="contacto" >

Nombre completo <input name="nombre" type="text" id="nombre completo"size="30" maxlength="100">
<br>
<br>
Correo electronico <input name="email" type="text" onBlur="MM_validateForm('email','','NisEmail');return document.MM_returnValue" size="25" maxlength="100" >
<br>
<br>
<!--Población <input name="poblacion" type="text" onBlur="MM_validateForm('poblacion','','R');return document.MM_returnValue" size="20" maxlength="60">
<br>
<br>-->
Sexo
<br>
<br>
<input type="radio" name="GrupoOpciones1" value="1"id="GrupoOpciones1_0" />
Hombre
<br>
<input type="radio" name="GrupoOpciones1" value="2"id="GrupoOpciones1_1"/> Mujer
<br>
<br>
<!--Aficiones
<br>

<textarea cols="50" rows="5" name="comentarios"></textarea>
<br>
<br>
Que opina de nuestra pagina
<br>
<br>
<input type="radio" name="GrupoOpciones2" value="mucho" >me ha gustado mucho
<br>
<input type="radio" name="GrupoOpciones2" value="regular" >no esta mal
<br>
<input type="radio" name="GrupoOpciones2" value="mal" >no me ha gustado nada
<br>
<br>-->
Danos tu opinion
<br>
<textarea cols="50" rows="5" name="opinion"></textarea>
<br>
<br>
<input type="submit" value="Enviar formulario">
<input type="Reset" value="Borrar datos">

</form>
</table>

</div>



<?php
error_reporting(0);
$nombre = $_POST['nombre'];
$correo_electronico= $_POST['email'];
$poblacion = $_POST['poblacion'];
$sexo=$_POST['GrupoOpciones1'];
$aficiones=$_POST['comentarios'];
$radio= $_POST['GrupoOpciones2'];
$opinion=$_POST['opinion'];
$header = 'From: ' . $mail . ", de la poblacion ".$poblacion."\r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Este mensaje fue enviado por " . $nombre . " \r\n";
$mensaje .= "Su e-mail es: " . $mail . " \r\n";
$mensaje .= "sexo" . $_POST['GrupoOpciones1'] . " \r\n";
$mensaje .= "aficiones " . $_POST['comentarios'] . " \r\n";
$mensaje .= "que opinas de nuestra pagina" . $_POST['GrupoOpciones2'] . " \r\n";
$mensaje .="danos tu opinion".$_POST['opinion'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'proyectorpmk@gmail.com';
$asunto = 'AQUÍ LO QUE QUIERAS';

mail($para, $asunto, utf8_decode($mensaje), $header);


?>
