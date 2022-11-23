<?php  
	if (!isset($_GET['id'])) {
		exit();
	}

	$codigo = $_GET['id'];
	include '../config/conexion.php';
	$sentencia = $bd->prepare("DELETE FROM tbl_admin WHERE id = ?;");
	$resultado = $sentencia->execute([$codigo]);

	if ($resultado === TRUE) {
		header('Location: ../view/index.php');
	}else{
		echo "Error";
	}

?>