<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include '../config/conexion.php';
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$contrasenya = $_POST['contrasenya'];

	if (!empty($nombre && $correo && $correo && $contrasenya) && filter_var($correo, FILTER_VALIDATE_EMAIL)) {

	//$sentencia = $bd->prepare("INSERT INTO tbl_camareros(nombre,correo,contrasenya) VALUES (?,?,?);");
	$sentencia = $bd->prepare("INSERT INTO `tbl_camareros`(`nombre`, `correo`, `contrasenya`) VALUES (?,?,?)");

	$resultado = $sentencia->execute([$nombre,$correo,$contrasenya]);

	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		header('Location: ../view/indexadmin.php');
	}else{
		echo "Error";
	}


	  } else {
		echo "<script>alert('¡Campos vacios o E-mail incorrecto!')</script>";
	  }



?>