<?php
session_start();

if (!isset($_SESSION['nombre']) && !isset($_SESSION['correoadmin'])) {

    header('Location: login.php');
} elseif (isset($_SESSION['nombre']) OR isset($_SESSION['correoadmin'])) {

    include '../config/conexion.php';
    $sentencia = $bd->query("SELECT * FROM tbl_reserva;");
    $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($usuarios);

} else {
    echo "Error en el sistema";
}


	$sentencia = $bd->query("SELECT * FROM tbl_mesa;");
	$mesas = $sentencia->fetchAll(PDO::FETCH_OBJ);

    $sentencia = $bd->query("SELECT * FROM tbl_sala;");
	$salas = $sentencia->fetchAll(PDO::FETCH_OBJ);
    
    
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
                    <h4>AÑADIR RESERVA</h4>
                </div>
                <div>
                    <a href="reserva.php" id="añadir"><i class="fa-solid fa-arrow-left"></i></a>
                </div>
            </div>
            <div class="form">
                <!-- inicio insert -->
                <form  action="../controller/controllerinsertreserva.php" method="POST">
                    <table>
                        <tr>
                            <td>Nombre: </td>
                            <td><input type="text" name="nombre" placeholder="nombre"></td>
                        </tr>
                        <tr>
                            <td>Dia: </td>
                            <td><input type="date" name="dia" placeholder="dia"></td>
                        </tr>
                        <tr>
                            <td>Hora: </td>
                            <td><input  type="time" name="hora" list="tiempo" placeholder="hora"></td>
                        </tr>
                        <tr>
                            <td>Personas: </td>
                            <td><input type="text" name="personas" placeholder="personas"></td>
                        </tr>
                        <tr>
                            <td>MESA: </td>
                            <td>
                                <select name="mesa">
                                <?php foreach ($mesas as $mesa) { ?>
                                            <option value='<?php echo $mesa->id; ?>'><?php echo $mesa->nombre_m; ?></option>
                                <?php };?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>SALA: </td>
                            <td>
                                <select name="sala">
                                <?php foreach ($salas as $sala) { ?>
                                            <option value='<?php echo $sala->id; ?>'><?php echo $sala->nombre_s; ?></option>
                                <?php };?>
                                </select>
                            </td>
                        </tr>
                        <input type="hidden" name="oculto" value="1">

                        <tr>
                            <td><input class="inputs" type="reset" name=""></td>
                            <td><input class="inputs" type="submit" value="AÑADIR RESERVA"></td>
                        </tr>

                        <datalist id="tiempo">
                            <option value="12:00">
                            <option value="13:00">
                            <option value="14:00">
                            <option value="15:00">
                            <option value="20:00">
                            <option value="21:00">
                            <option value="22:00">
                            <option value="23:00">
                            <option value="00:00">
                        </datalist>
                    </table>
                </form>
                <!-- fin insert-->
            </div>
        </div>
    </div>
</body>

</html>