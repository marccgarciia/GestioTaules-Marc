<?php  

$estado = $_POST['estado'];
$mesa = $_POST['mesa'];
$estado = "LIBRE";

include '../config/conexion.php';
    $sentencia = $bd->prepare("UPDATE tbl_mesa SET estado = ? WHERE id = ?");
    $sentencia->bindParam(1, $estado);
    $sentencia->bindParam(2, $mesa);
    $resultado = $sentencia->execute();
    
    if ($resultado) {
        echo "OK";
    }else{
        echo "Error";
    }


?>