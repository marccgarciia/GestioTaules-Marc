<?php 
	session_start();
	include_once '../config/conexion.php';
	$usuario = $_POST['txtUsu'];
	$contrasena = $_POST['txtPass'];
	$sentencia = $bd->prepare('select * from tbl_admin where correo = ? and contrasenya = ?;');
	$sentencia->execute([$usuario, $contrasena]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);
	//print_r($datos);

	if ($datos === FALSE) {
		header('Location: ../view/login.php');
	}elseif($sentencia->rowCount() == 1){
		$_SESSION['nombre'] = $datos->correo;
		header('Location: ../view/index.php');
	}
?>