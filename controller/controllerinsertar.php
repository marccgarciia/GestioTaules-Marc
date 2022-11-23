<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include '../config/conexion.php';
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$contrasenya = $_POST['contrasenya'];


	//$sentencia = $bd->prepare("INSERT INTO tbl_camareros(nombre,correo,contrasenya) VALUES (?,?,?);");
	$sentencia = $bd->prepare("INSERT INTO `tbl_camareros`(`nombre`, `correo`, `contrasenya`) VALUES (?,?,?)");

	$resultado = $sentencia->execute([$nombre,$correo,$contrasenya]);

	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		header('Location: ../view/index.php');
	}else{
		echo "Error";
	}
?>