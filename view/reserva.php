<?php
//MOSTRAR ERRORES
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);



session_start();

if (!isset($_SESSION['nombre'])) {

	header('Location: login.php');
} elseif (isset($_SESSION['nombre'])) {

	include '../config/conexion.php';
	$sentencia = $bd->query("SELECT * FROM tbl_reserva;");
	$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
	//print_r($usuarios);

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
	<title>Reserva</title>
	<!-- BOOTSTRAP only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<!--LINK ESTILOS-->
	<link rel="stylesheet" href="../static/css/estilos.css">
	<!--LINK JS-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/2b5286e1aa.js" crossorigin="anonymous"></script>
</head>

<body>
	<div class="nav">
		<div class="bienvenida">
			<p>Bienvenido/a: <b><?php echo $_SESSION['nombre'] ?></b></p>
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

					<a href="mesa.php"><button class="botones">MESA</button></a>
					<a href="sala.php"><button class="botones">SALA</button></a>
					<a href="index.php"><button class="botones">CAMAREROS</button></a>
					<h4>RESERVA</h4>

				</div>

				<div>
					<a href="insertreserva.php" id="añadir"><i class="fa-solid fa-plus"></i></a>
				</div>

			</div>
			<div>
				<form autocomplete="off" action="" method="post" id="frmbusqueda">
					<input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="">
				</form>
			</div>
			<div class="over">
				<table class="table table-hover">
					<tr>
						<th scope="col">#</th>
						<th scope="col">NOMBRE</th>
						<th scope="col">DIA</th>
						<th scope="col">HORA</th>
						<th scope="col">PERSONAS</th>
						<th scope="col">MESA</th>
						<th scope="col">SALA</th>
						<th scope="col">OPCIONES</th>

					</tr>
					<tbody id="resultadoreserva">

					</tbody>
				</table>
			</div>
		</div>

	</div>
</body>

</html>
<script src="../static/js/reserva.js"></script>