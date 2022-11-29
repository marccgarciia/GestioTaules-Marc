<?php  
//MOSTRAR ERRORES

	$id = $_POST['id_m'];

	include '../config/conexion.php';
	$sentencia = $bd->prepare("DELETE FROM tbl_mesa WHERE id_m = ?;");
	$sentencia->bindParam(1, $id);
	$resultado = $sentencia->execute();

	if ($resultado) {
		echo "OK";
		// header('Location: ../view/index.php');
	}else{
		echo "Error";
	}

?>