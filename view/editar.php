<?php
session_start();
if (!isset($_GET['id'])) {
	header('Location: index.php');
}

// if (!isset($_SESSION['nombre'])) {
// 	header('Location: login.php');
// } elseif (isset($_SESSION['nombre'])) {

// 	include '../config/conexion.php';
// 	$id = $_GET['id'];

// 	$sentencia = $bd->prepare("SELECT * FROM tbl_camareros WHERE id = ?;");
// 	$sentencia->execute([$id]);
// 	$persona = $sentencia->fetch(PDO::FETCH_OBJ);
// 	//print_r($persona);
// } else {
// 	echo "Error en el sistema";
// }
if (!isset($_SESSION['nombre']) && !isset($_SESSION['correoadmin'])) {
	header('Location: login.php');
	
} elseif (isset($_SESSION['nombre']) OR isset($_SESSION['correoadmin'])) {
	include '../config/conexion.php';
	$id = $_GET['id'];

	$sentencia = $bd->prepare("SELECT * FROM tbl_camareros WHERE id = ?;");
	$sentencia->execute([$id]);
	$persona = $sentencia->fetch(PDO::FETCH_OBJ);
	//print_r($persona);
} else {
	echo "Error en el sistema";
}
?>
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::--->
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::--->
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::--->
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::--->
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::--->
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<!-- BOOTSTRAP only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<!--LINK ESTILOS-->
	<link rel="stylesheet" href="../static/css/estilos.css">
	<!--LINK JS-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/2b5286e1aa.js" crossorigin="anonymous"></script>
	<script src="../static/js/index.js"></script>
	<link rel="icon" type="image/png" href="../static/img/logo.png"/>
</head>

<body onload="mueveReloj()">
	<div class="nav">
		<div class="bienvenida">
			<p>Bienvenido/a: <b><?php echo $_SESSION['nombre'];  echo $_SESSION['correoadmin'] ?></b></p>
			<form name="form_reloj">
				<?=date("d-m-Y /// ");?><input type="text" name="reloj" size="10" style="border:none;">
			</form>
		</div>
		<div class="logodiv">
			<img src="../static/img/logo.png" alt="Logo" class="logo">
		</div>
		<div class="cerrarsesion">
			<a href="../controller/cerrarsesion.php">Cerrar Sesión</a>
		</div>
	</div>
	<hr>
	<div class="general">
		<div class="crud">
			<div class="mininav">
				<div>
					<h4>EDITAR</h4>
				</div>
				<div>
					<a href="indexadmin.php" id="añadir"><i class="fa-solid fa-arrow-left"></i></a>
				</div>
			</div>
			<div class="form">
				<form method="POST" action="../controller/controllereditar.php">
					<table>
						<tr>
							<td>NOMBRE: </td>
							<td><input type="text" name="nombre" value="<?php echo $persona->nombre; ?>"></td>
						</tr>
						<tr>
							<td>CORREO: </td>
							<td><input type="text" name="correo" value="<?php echo $persona->correo; ?>"></td>
						</tr>
						<tr>
							<td>CONTRASEÑA: </td>
							<td><input type="text" name="contrasenya" value="<?php echo $persona->contrasenya; ?>"></td>
						</tr>
						<tr>
							<input type="hidden" name="oculto">
							<input type="hidden" name="id" value="<?php echo $persona->id; ?>">
							<td colspan="2"><input class="inputs" type="submit" value="EDITAR"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</body>

</html>
<script src="../static/js/reloj.js"></script>