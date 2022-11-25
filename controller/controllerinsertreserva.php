<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include '../config/conexion.php';
	$nombre = $_POST['nombre'];
	$dia = $_POST['dia'];
	$hora = $_POST['hora'];
	$personas = $_POST['personas'];
	$mesa = $_POST['mesa'];
	$sala = $_POST['sala'];

	$sentencia = $bd->prepare("INSERT INTO tbl_reserva (id, nombre, dia, hora, personas, id_mesa, id_sala) VALUES (NULL,?,?,?,?,?,?);");
	$sentencia->bindParam(1, $nombre);
	$sentencia->bindParam(2, $dia);
	$sentencia->bindParam(3, $hora);
	$sentencia->bindParam(4, $personas);
	$sentencia->bindParam(5, $mesa);
	$sentencia->bindParam(6, $sala);

	$resultado = $sentencia->execute();

	if ($resultado) {
		//echo "OK";
		header('Location: ../view/reserva.php');
	}else{
		echo "Error";
	}
