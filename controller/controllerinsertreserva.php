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



if (!empty($nombre && $dia && $hora && $personas && $mesa && $sala)) {


	$sentencia = $bd->prepare('select * from tbl_reserva where dia = ? and hora = ? and id_mesa = ? and id_sala = ?;');
	$sentencia->execute([$dia, $hora, $mesa, $sala]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);

	if($sentencia->rowCount() == 1){
		echo "<script>alert('¡Ya hay una reserva a esta hora en esta mesa!')</script>";
	}else {
		$sentencia = $bd->prepare("INSERT INTO `tbl_reserva`(`id_reserva`, `nombre`, `dia`, `hora`, `personas`, `id_mesa`, `id_sala`) VALUES (NULL,?,?,?,?,?,?);");
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
		} else {
			echo "<script>alert('¡ERROR EN EL INSERT!')</script>";
		}
	}

} else {
	echo "<script>alert('¡Campos vacios!')</script>";
}

