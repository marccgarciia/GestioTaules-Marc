<?php
//MOSTRAR ERRORES
    //1. Conexion a la bd
    //2. Consulta SQL
    //3. Ejecutar consulta SQL
    //4. Transformar consulta SQL en Array assoc.
    //5. Montar tabla 
require_once "../config/conexion.php";
if(empty($_POST['filtro'])){

	//$sentencia = $bd->query("SELECT * FROM tbl_mesa;");
    $sentencia = $bd->query("SELECT * FROM tbl_mesa INNER JOIN tbl_sala ON tbl_mesa.id_sala = tbl_sala.id;");

	$mesas = $sentencia->fetchAll(PDO::FETCH_OBJ);


}else{

    $filtro=$_POST['filtro'];
    $sentencia = $bd->query("SELECT * FROM tbl_mesa WHERE id LIKE '%".$filtro."%' OR nombre LIKE '%".$filtro."%' OR estado LIKE '%".$filtro."%' OR id_sala LIKE '%".$filtro."%'");
	$mesas = $sentencia->fetchAll(PDO::FETCH_OBJ);
}

    $i = 1;
    foreach ($mesas as $mesa) {
    ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $mesa->nombre_m; ?></td>
            <td><?php echo $mesa->estado; ?></td>
            <td><?php echo $mesa->id_sala; echo " - ";echo $mesa->nombre_s; ?></td>
        </tr>
    <?php
    };
    ?>
