<?php

session_start();

if (!isset($_SESSION['nombre']) && !isset($_SESSION['correoadmin'])) {

	header('Location: login.php');
} elseif (isset($_SESSION['nombre']) or isset($_SESSION['correoadmin'])) {

	include '../config/conexion.php';
	$sentencia = $bd->query("SELECT * FROM tbl_mesa;");
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
	<title>Mesa</title>
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
			<p>Bienvenido/a: <b><?php echo $_SESSION['nombre'];  echo $_SESSION['correoadmin'] ?></b></p>
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

					<a href="sala.php"><button class="botones">SALA</button></a>
					<a href="reserva.php"><button class="botones">RESERVA</button></a>
					<a href="index.php"><button class="botones">CAMAREROS</button></a>
					<?php
					if (!isset($_SESSION['correoadmin'])) {

					} elseif (isset($_SESSION['correoadmin'])) {
						?><a href="indexadmin.php"><button class="botones">CAMAREROS ADMIN</button></a><?php

					} else {
						echo "Error en el sistema";
					}
					?>
					<h4>MESAS</h4>

				</div>

			</div>
			<div>
				<form autocomplete="off" action="" method="post" id="frmbusqueda">
					<input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="">
				</form>
			</div>
			<div class="over">
				<table class="table table-hover" style="text-align:center;">
					<tr>
						<th scope="col">#</th>
						<th scope="col">NOMBRE</th>
						<th scope="col">SALA</th>
						<th scope="col">ESTADO</th>
						<th scope="col">NUEVO ESTADO</th>
					</tr>
					<tbody id="resultadomesa">


					</tbody>
				</table>
			</div>

		</div>

	</div>
</body>

</html>

<script src="../static/js/mesa.js"></script>