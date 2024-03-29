<?php
require 'admin/config.php';
require 'functions.php';
$conexion = conexion($bd_config);
if (!$conexion) {
	header('Location: error.php');
}
if ($_SERVER['REQUEST_METHOD']=="GET" && !empty($_GET['busqueda'])) {
	$busqueda = limpiarDatos($_GET['busqueda']);
	$resultados = obtener_busquedas($blog_config['post_por_pagina'],$busqueda, $conexion);
	if(empty($resultados)){
		$titulo= 'No se encontraron articulos con el resultado: '. $busqueda;
	}else{
		$titulo='Resultados de la busqueda: '.$busqueda;
	}
}else{
 	header('Location: '.RUTA.'index.php');
}
require 'views/buscar.view.php';
?>