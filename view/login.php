<?php 
	session_start();
	if (isset($_SESSION['nombre'])) {
		header('Location: index.php');
	}
?>
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::--->
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::--->
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::--->
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::--->
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::--->
<!DOCTYPE html>
<html>
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
	<script src="../static/js/validaciones.js"></script>
	<link rel="icon" type="image/png" href="../static/img/logo.png"/>
</head>
<body>
	<div class="contenedor">
		<div class="formulario">
		<h2>LOGIN</h2>	
			<form method="POST" action="../controller/logincontroller.php">
				<input type="email" name="txtUsu" placeholder="Usuario" onkeyup="mail(this)" id="correo">
                <p id='resultadom'></p>
				<input type="password" name="txtPass" placeholder="Password" onkeyup="password(this)" id="pass">
				<br>
				<p id='resultadop'></p>

				<input type="submit" value="Iniciar sesión" class="login">
			</form>
		</div>
	</div>
</body>
</html>	
