<?php  

$id = $_POST['id'];

include '../config/conexion.php';



    if ($id === 5) {
        echo "OK";
    }else{
        echo "Error";
    }
?>