<?php
session_start();

if (!isset($_SESSION['nombre']) && !isset($_SESSION['correoadmin'])) {

	header('Location: login.php');
} elseif (isset($_SESSION['nombre']) OR isset($_SESSION['correoadmin'])) {

	include '../config/conexion.php';
	$sentencia = $bd->query("SELECT * FROM tbl_sala;");
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
	<title>Salas</title>
	<!-- BOOTSTRAP only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<!--LINK ESTILOS-->
	<link rel="stylesheet" href="../static/css/estilos.css">
	<!--LINK JS-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/2b5286e1aa.js" crossorigin="anonymous"></script>
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
			<a href="../controller/cerrarsesion.php">Cerrar Sesi??n</a>
		</div>
	</div>
	<hr>
	<div class="general">
		<div class="crud">
			<div class="mininav">
				<div>
					<a href="mesa.php"><button class="botones">MESA</button></a>
					<a href="reserva.php"><button class="botones">RESERVA</button></a>
					<a href="index.php"><button class="botones">CAMAREROS</button></a>
					<?php
					if (!isset($_SESSION['correoadmin'])) {

					} elseif (isset($_SESSION['correoadmin'])) {
						?><a href="indexadmin.php"><button class="botones">CAMAREROS ADMIN</button></a><?php
						?><a href="mesasadmin.php"><button class="botones">MESAS ADMIN</button></a><?php

					} else {
						echo "Error en el sistema";
					}
					?>
					<h4>SALAS</h4>

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
						<th scope="col">OCUPACI??N</th>
					</tr>
					<tbody id="resultadosala">

					</tbody>
				</table>
			</div>
		</div>

	</div>
</body>

</html>
<script src="../static/js/sala.js"></script>
<script src="../static/js/reloj.js"></script>