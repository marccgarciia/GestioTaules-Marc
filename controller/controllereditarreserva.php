<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: ../view/index.php');
	}

	include '../config/conexion.php';
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$dia = $_POST['dia'];
	$hora = $_POST['hora'];
	$personas = $_POST['personas'];
	$mesa = $_POST['mesa'];
	$sala = $_POST['sala'];

	$sentencia = $bd->prepare("UPDATE tbl_reserva SET nombre = ?, dia = ?, hora = ?, personas = ?, mesa = ?, sala = ? WHERE id_reserva = ?;");
	$resultado = $sentencia->execute([$nombre,$dia,$hora,$personas,$mesa,$sala]);

	if ($resultado === TRUE) {
		echo "OK";
		//header('Location: ../view/index.php');
	}else{
		echo "Error";
	}
?>