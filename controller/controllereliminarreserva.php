<?php  
	$id = $_POST['id_reserva'];
	
	include '../config/conexion.php';
	$sentencia = $bd->prepare("DELETE FROM tbl_reserva WHERE id_reserva = ?;");
	$sentencia->bindParam(1, $id);
	$resultado = $sentencia->execute();

	if ($resultado) {
		echo "OK";
		// header('Location: ../view/index.php');
	}else{
		echo "Error";
	}
?>