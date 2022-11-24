<?php
//MOSTRAR ERRORES
    //1. Conexion a la bd
    //2. Consulta SQL
    //3. Ejecutar consulta SQL
    //4. Transformar consulta SQL en Array assoc.
    //5. Montar tabla 
require_once "../config/conexion.php";
if(empty($_POST['filtro'])){

	$sentencia = $bd->query("SELECT * FROM tbl_camareros;");
	$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);


}else{

    $filtro=$_POST['filtro'];
    $sentencia = $bd->query("SELECT * FROM tbl_camareros WHERE id LIKE '%".$filtro."%' OR nombre LIKE '%".$filtro."%' OR correo LIKE '%".$filtro."%'");
	$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
}

    $i = 1;
    foreach ($usuarios as $user) {
    ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $user->nombre; ?></td>
            <td><?php echo $user->correo; ?></td>
            <td><?php echo $user->contrasenya; ?></td>
            <td><button type='button' class='botonedelete' onclick=Eliminar(<?php echo $user->id; ?>)>Eliminar</button>
            <a href="editar.php?id=<?php echo $user->id; ?>"><button class='botonmodificar' >Editar</button></a>

        </tr>
    <?php
    };
    ?>
