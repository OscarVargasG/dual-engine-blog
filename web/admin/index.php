<?php session_start();
//Archivo Index del Admin

require 'config.php';
require '../functions.php';

$conexion = conexion($bd_config);
comprobarSession();
if (!$conexion) {

	header('Location: ../error.php');
}
$posts = obtener_post($blog_config['post_por_pagina'], $conexion);

$nombre = $_SESSION['usuario']['nombre'];
require'../views/admin_index.view.php'

 ?>