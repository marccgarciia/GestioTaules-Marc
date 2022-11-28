<?php
//MOSTRAR ERRORES
    //1. Conexion a la bd
    //2. Consulta SQL
    //3. Ejecutar consulta SQL
    //4. Transformar consulta SQL en Array assoc.
    //5. Montar tabla 
require_once "../config/conexion.php";
if(empty($_POST['filtro'])){

	$sentencia = $bd->query("SELECT * FROM tbl_sala;");
	$salas = $sentencia->fetchAll(PDO::FETCH_OBJ);

}else{

    $filtro=$_POST['filtro'];
    $sentencia = $bd->query("SELECT * FROM `tbl_sala` WHERE 
    id LIKE '%".$filtro."%'
    OR nombre_s LIKE '%".$filtro."%'");

	$salas = $sentencia->fetchAll(PDO::FETCH_OBJ);
}

    $i = 1;
    foreach ($salas as $sala) {
    ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $sala->nombre_s; ?></td>
            <td>----> 20 personas ###</td>
        </tr>
    <?php
    };
    ?>