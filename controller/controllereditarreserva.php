<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: ../view/index.php');
	}

	include '../config/conexion.php';
	$id = $_POST['id_reserva'];
	$nombre = $_POST['nombre'];
	$dia = $_POST['dia'];
	$hora = $_POST['hora'];
	$personas = $_POST['personas'];
	$mesa = $_POST['mesa'];
	$sala = $_POST['sala'];

	$sentencia = $bd->prepare("UPDATE `tbl_reserva` SET `nombre`= ?, `dia`= ?, `hora`= ?, `personas`= ?, `id_mesa`= ?, `id_sala`= ? WHERE `id_reserva` = $id;");
	$sentencia->bindParam(1, $nombre);
	$sentencia->bindParam(2, $dia);
	$sentencia->bindParam(3, $hora);
	$sentencia->bindParam(4, $personas);
	$sentencia->bindParam(5, $mesa);
	$sentencia->bindParam(6, $sala);

	$resultado = $sentencia->execute();

	if ($resultado === TRUE) {
		echo "OK";
		header('Location: ../view/reserva.php');
	}else{
		echo "Error";
	}




	
?>

