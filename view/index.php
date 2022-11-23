<?php
session_start();

if (!isset($_SESSION['nombre'])) {

	header('Location: login.php');
} elseif (isset($_SESSION['nombre'])) {

	include '../config/conexion.php';
	$sentencia = $bd->query("SELECT * FROM tbl_admin;");
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
	<title>Login</title>
	<!-- BOOTSTRAP only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<!--LINK ESTILOS-->
	<link rel="stylesheet" href="../static/css/estilos.css">
	<!--LINK JS-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/2b5286e1aa.js" crossorigin="anonymous"></script>
	<script src="../static/js/index.js"></script>
</head>

<body>
	<div class="nav">
		<div class="bienvenida">
			<p>Bienvenido: <b><?php echo $_SESSION['nombre'] ?></b></p>
		</div>
		<div>
			<a href="../controller/cerrarsesion.php">Cerrar Sesión</a>
		</div>
	</div>
	<hr>
	<div class="general">
		<div class="crud">
			<div class="mininav">
				<div>
					<h4>USUARIOS</h4>
				</div>
				<div>
					<a href="añadir.php" id="añadir"><i class="fa-solid fa-plus"></i></a>
				</div>
			</div>

			<table class="table table-hover">
				<tr>
					<th scope="col">#</th>
					<th scope="col">NOMBRE</th>
					<th scope="col">CORREO</th>
					<th scope="col">CONTRASEÑA</th>
					<th scope="col">EDITAR</th>
					<th scope="col">ELIMINAR</th>
				</tr>

				<?php
				$i = 1;
				foreach ($usuarios as $user) {
				?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $user->nombre; ?></td>
						<td><?php echo $user->correo; ?></td>
						<td><?php echo $user->contrasenya; ?></td>
						<td><a href="editar.php?id=<?php echo $user->id; ?>">Editar</a></td>
						<td><a href="../controller/controllereliminar.php?id=<?php echo $user->id; ?>">Eliminar</a></td>
					</tr>
				<?php
				}
				?>
			</table>
		</div>

	</div>
</body>

</html>