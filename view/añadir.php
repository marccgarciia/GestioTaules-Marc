<?php
session_start();

// if (!isset($_SESSION['nombre'])) {

//     header('Location: login.php');
// } elseif (isset($_SESSION['nombre'])) {

//     include '../config/conexion.php';
//     $sentencia = $bd->query("SELECT * FROM tbl_camareros;");
//     $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
//     //print_r($usuarios);

// } else {
//     echo "Error en el sistema";
// }
if (!isset($_SESSION['nombre']) && !isset($_SESSION['correoadmin'])) {
	header('Location: login.php');
	
} elseif (isset($_SESSION['nombre']) OR isset($_SESSION['correoadmin'])) {
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
            <p>Bienvenido: <b><?php echo $_SESSION['nombre'];  echo $_SESSION['correoadmin'] ?></b></p>
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
                    <h4>AÑADIR</h4>
                </div>
                <div>
                    <a href="indexadmin.php" id="añadir"><i class="fa-solid fa-arrow-left"></i></a>
                </div>
            </div>
            <div class="form">
                <!-- inicio insert -->
                <form method="POST" action="../controller/controllerinsertar.php">
                    <table>
                        <tr>
                            <td>Nombre: </td>
                            <td><input type="text" name="nombre" placeholder="nombre"></td>
                        </tr>
                        <tr>
                            <td>Correo: </td>
                            <td><input type="text" name="correo" placeholder="correo"></td>
                        </tr>
                        <tr>
                            <td>Contraseña: </td>
                            <td><input type="text" name="contrasenya" placeholder="contrasenya"></td>
                        </tr>
                        <input type="hidden" name="oculto" value="1">

                        <tr>
                            <td><input class="inputs" type="reset" name=""></td>
                            <td><input class="inputs" type="submit" value="AÑADIR"></td>
                        </tr>
                    </table>
                </form>
                <!-- fin insert-->
            </div>
        </div>
    </div>
</body>

</html>