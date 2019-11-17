<?php
require 'admin/config.php';
require 'functions.php';

$errores = '';
$enviado = '';

if (isset($_POST['submit'])) {
 $nombre = $_POST['nombre'];
 $correo = $_POST['correo'];
 $mensaje = $_POST['mensaje'];

 if (!empty($nombre)) {
 $nombre = limpiarDatos($_POST['nombre']);
 } else {
  $errores .= 'Por favor ingresa un nombre <br />';
 }

 if (!empty($correo)) {
  $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

  if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
   $errores .= 'Por favor ingresa un correo valido <br />';
  }
 } else {
  $errores .= 'Por favor ingresa un correo <br />';
 }

 if(!empty($mensaje)){
   $mensaje = limpiarDatos($_POST['mensaje']);
 } else {
  $errores .= 'Por favor ingresa el mensaje <br />';
 }

 if(!$errores){
  $enviar_a = 'voscar4955@gmail.com';
  $asunto = 'Correo enviado desde oscarvargasweb.com';
  $mensaje_preparado = "De: $nombre \n";
  $mensaje_preparado .= "Correo: $correo \n";
  $mensaje_preparado .= "Mensaje: " . $mensaje;

  mail($enviar_a, $asunto, $mensaje_preparado);
  $enviado = 'true';
 }
}
require 'views/contacto.view.php';

?>