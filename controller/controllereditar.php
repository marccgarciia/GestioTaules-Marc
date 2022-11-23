<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: ../view/index.php');
	}

	include '../config/conexion.php';
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$contrasenya = $_POST['contrasenya'];

	$sentencia = $bd->prepare("UPDATE tbl_admin SET nombre = ?, correo = ?, contrasenya = ? WHERE id = ?;");
	$resultado = $sentencia->execute([$nombre,$correo,$contrasenya, $id]);

	if ($resultado === TRUE) {
		header('Location: ../view/index.php');
	}else{
		echo "Error";
	}
?>