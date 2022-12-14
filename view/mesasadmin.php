<?php
session_start();

if (!isset($_SESSION['correoadmin'])) {
	header('Location: login.php');
	
} elseif (isset($_SESSION['correoadmin'])) {
	include '../config/conexion.php';
	$sentencia = $bd->query("SELECT * FROM tbl_camareros;");
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
	<title>Mesas Admin</title>
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
			<p>Bienvenido/a: <b><?php echo $_SESSION['nombre'];
								echo $_SESSION['correoadmin'] ?></b></p>
			<form name="form_reloj">
				<?= date("d-m-Y /// "); ?><input type="text" name="reloj" size="10" style="border:none;">
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

					<a href="sala.php"><button class="botones">SALA</button></a>
					<a href="reserva.php"><button class="botones">RESERVA</button></a>
					<a href="index.php"><button class="botones">CAMAREROS</button></a>
					<a href="mesa.php"><button class="botones">MESAS</button></a>
					<a href="indexadmin.php"><button class="botones">CAMAREROS ADMIN</button></a>
	
					<h4>MESAS ADMIN</h4>

				</div>

				<div>
					<a href="a??adirmesa.php" id="a??adir"><i class="fa-solid fa-plus"></i></a>
				</div>
			</div>
			<div class="divgeneral">
				<div class="buscador">
					<form autocomplete="off" action="" method="post" id="frmbusqueda">
						<input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="">
					</form>
				</div>
				<div class="estados">
					<form action="" method="POST" id="actualizar" name="actualizar">

						<select name="mesa" id="mesa">
							<?php
							$sentencia = $bd->query("SELECT * FROM tbl_mesa");
							$mesas = $sentencia->fetchAll(PDO::FETCH_OBJ);
							foreach ($mesas as $mesa) {
								echo "<option value='$mesa->id_m'>$mesa->nombre_m</option>";
							}
							?>
						</select>

						<select name="estado" id="estado">
							<option value="LIBRE">LIBRE</option>
							<option value="OCUPADO">OCUPADO</option>
							<option value="MANTENIMIENTO">MANTENIMIENTO</option>
						</select>
						<button class="enviar" type="button" id="enviar"><i class="fa-solid fa-check"></i></button>
					</form>
				</div>
			</div>
			<div class="reservadas">
					<b class="tituloreser">Reservadas para hoy:</b>
					<?php
					$sentenciareserva = $bd->query("SELECT * FROM tbl_reserva INNER JOIN tbl_mesa ON tbl_mesa.id_m = tbl_reserva.id_mesa;");
					$reservas = $sentenciareserva->fetchAll(PDO::FETCH_OBJ);
					// Obteniendo la fecha actual del sistema con PHP
					$fechaActual = date('Y-m-d');

					foreach ($reservas as $reserva) {
						if ($fechaActual == $reserva->dia) {
							echo "$reserva->nombre_m - ";
							echo "$reserva->hora";
							echo "???|???";
						}
					}
					?>
			</div>

			<div class="over">
				<table class="table table-hover" style="text-align:center;">
					<tr>
						<th scope="col">#</th>
						<th scope="col">NOMBRE</th>
						<th scope="col">SALA</th>
						<th scope="col">ESTADO</th>
						<th scope="col">ELIMINAR</th>
					</tr>
					<tbody id="resultadomesa">


					</tbody>
				</table>
			</div>

		</div>

	</div>
</body>

</html>

<script src="../static/js/mesasadmin.js"></script>
<script src="../static/js/reloj.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
