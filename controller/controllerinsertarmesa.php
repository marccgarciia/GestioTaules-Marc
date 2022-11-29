<?php
//FUNCIONA ----------------------------------------------------------------
include '../config/conexion.php';
$nombre = $_POST['nombre'];
$sala = $_POST['sala'];
$estado = "LIBRE";
$foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));

if (!empty($nombre && $sala)) {

    $sentencia = $bd->prepare("INSERT INTO `tbl_mesa`(`nombre_m`, `estado`, `id_sala`, `img`) VALUES (?,?,?,?);");
    $sentencia->bindParam(1, $nombre);
    $sentencia->bindParam(2, $estado);
    $sentencia->bindParam(3, $sala);
    $sentencia->bindParam(4, $foto);

    $resultado = $sentencia->execute();

    if ($resultado === TRUE) {
        //echo "Insertado correctamente";
        header('Location: ../view/mesasadmin.php');
    } else {
        echo "Error";
    }
} else {
    echo "¡Campos vacios!";
}
//FUNCIONA ----------------------------------------------------------------