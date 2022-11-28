<?php
//MOSTRAR ERRORES
    //1. Conexion a la bd
    //2. Consulta SQL
    //3. Ejecutar consulta SQL
    //4. Transformar consulta SQL en Array assoc.
    //5. Montar tabla 
require_once "../config/conexion.php";
if(empty($_POST['filtro'])){

	$sentencia = $bd->query("SELECT * FROM tbl_reserva INNER JOIN tbl_sala ON tbl_reserva.id_sala = tbl_sala.id;");
	$reservas = $sentencia->fetchAll(PDO::FETCH_OBJ);

}else{
    $filtro=$_POST['filtro'];
    $sentencia = $bd->query("SELECT * FROM tbl_reserva INNER JOIN tbl_sala ON tbl_reserva.id_sala = tbl_sala.id INNER JOIN tbl_mesa ON tbl_reserva.id_sala = tbl_mesa.id WHERE nombre LIKE '%".$filtro."%' OR dia LIKE '%".$filtro."%' OR hora LIKE '%".$filtro."%' OR personas LIKE '%".$filtro."%' OR nombre_s LIKE '%".$filtro."%' OR id_mesa LIKE '%".$filtro."%'");
	$reservas = $sentencia->fetchAll(PDO::FETCH_OBJ);
}

    $i = 1;
    foreach ($reservas as $reserva) {
    ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $reserva->nombre; ?></td>
            <td><?php echo $reserva->dia; ?></td>
            <td><?php echo $reserva->hora; ?></td>
            <td><?php echo $reserva->personas; ?></td>
            <td><?php echo $reserva->id_mesa; ?></td>
            <td><?php echo $reserva->id_sala; echo " - "; echo $reserva->nombre_s;?></td>
            <td><button type='button' class='botonedelete' onclick=EliminarReserva(<?php echo $reserva->id_reserva; ?>)>Eliminar</button>
            <a href="editarreserva.php?id=<?php echo $reserva->id_reserva; ?>"><button class='botonmodificar' >Editar</button></a>
        </tr>
    <?php
    };
    ?>