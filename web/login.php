<?php session_start();
require 'admin/config.php';
require 'functions.php';
if (isset($_SESSION['admin'])) {
		header('Location: '.$RUTA.'admin/index.php');
}
$conexion = conexion($bd_config);
if (!$conexion) {
		header('Location: '.$RUTA.'error.php');
}
$errores = '';
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$email = limpiarDatos($_POST['email']);
	$password = limpiarDatos($_POST['password']);
	$password = hash('sha512', $password);
	$statement = $conexion->prepare('
		SELECT * FROM usuarios WHERE email = :email AND password = :password'
		);
	$statement->execute(array(
		':email' => $email,
		':password' => $password
		));
	$resultado = $statement->fetch();
	if ($resultado !== false) {
		$_SESSION['usuario'] = $resultado;
		header('Location: '.$RUTA.'admin/index.php');
	} else {
		$errores .= '<li class="extracto">Datos Incorrectos</li>';
	}
}
require 'views/login.view.php';
?>

