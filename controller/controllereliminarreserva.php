<?php  
//MOSTRAR ERRORES
	if (!isset($_POST['id'])) {
		exit();
	}

	$id = $_POST['id'];
	
	include '../config/conexion.php';
	$sentencia = $bd->prepare("DELETE FROM tbl_reserva WHERE id = ?;");
	$sentencia->bindParam(1, $id);
	$resultado = $sentencia->execute();

	if ($resultado) {
		echo "OK";
		// header('Location: ../view/index.php');
	}else{
		echo "Error";
	}

?>