<?php session_start();

require 'config.php';
require '../functions.php';

comprobarSession();

$conexion = conexion($bd_config);
if (!$conexion) {
	header('Location: ../error.php');
}
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {

	$check = @getimagesize($_FILES['thumb']['tmp_name']);

	$titulo = limpiarDatos($_POST['titulo']);
	$extracto = limpiarDatos($_POST['extracto']);
	$texto = $_POST['texto'];
	$thumb = $_FILES['thumb']['tmp_name'];


	if ($check !== false) {
 		$carpeta_destino = '../'.$blog_config['carpeta_imagenes'];
		$archivo_subido = $carpeta_destino . $_FILES['thumb']['name'];
		move_uploaded_file($thumb, $archivo_subido);


		$statement = $conexion->prepare(
			'INSERT INTO articulos(id,titulo,extracto,texto,thumb)
			VALUES(null,:titulo,:extracto,:texto,:thumb )'
			);
		$statement->execute(array(
			':titulo'=>$titulo,
			':extracto'=>$extracto,
			':texto'=>$texto,
			':thumb'=>$_FILES['thumb']['name']
			));

		header('Location: '.RUTA.'admin/index.php');
	} else{
		$error = "El archivo no es una imagen o es un archivo muy pesado";
 	}
 
}



require'../views/nuevo.view.php'

?>

