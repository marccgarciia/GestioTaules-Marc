<?php
//MOSTRAR ERRORES
//1. Conexion a la bd
//2. Consulta SQL
//3. Ejecutar consulta SQL
//4. Transformar consulta SQL en Array assoc.
//5. Montar tabla 
require_once "../config/conexion.php";
if (empty($_POST['filtro'])) {

    //$sentencia = $bd->query("SELECT * FROM tbl_mesa;");
    $sentencia = $bd->query("SELECT * FROM tbl_mesa INNER JOIN tbl_sala ON tbl_mesa.id_sala = tbl_sala.id;");

    $mesas = $sentencia->fetchAll(PDO::FETCH_OBJ);
} else {

    $filtro = $_POST['filtro'];
    
    $sentencia = $bd->query("SELECT * FROM `tbl_mesa` INNER JOIN tbl_sala ON tbl_mesa.id_sala = tbl_sala.id WHERE 
    tbl_mesa.id LIKE '%".$filtro."%'
    OR nombre_m LIKE '%".$filtro."%'
    OR estado LIKE '%".$filtro."%'
    OR id_sala LIKE '%".$filtro."%'
    OR tbl_sala.nombre_s LIKE '%".$filtro."%'");

    $mesas = $sentencia->fetchAll(PDO::FETCH_OBJ);
}


$i = 1;
foreach ($mesas as $mesa) {
?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $mesa->nombre_m; ?></td>

        <td>
            <?php 
            echo $mesa->id_sala;
            echo " - ";
            echo $mesa->nombre_s; 
            ?>
        </td>
        
        <td>
            <?php
            if ($mesa->estado == "LIBRE") {
                ?><p id="estat" style="color:#30C437;">LIBRE</p><?php
            } else if ($mesa->estado == "OCUPADO") {
                ?><p id="estat" style="color:#C43030;">OCUPADO</p><?php
            } else if ($mesa->estado == "MANTENIMIENTO") {
                ?><p id="estat" style="color:#E8DD36;">MANTENIMIENTO</p><?php
            }
            ?>
        </td>


        <td>
            <select id="estado" onChange="Estado()">
                <option value="">NUEVO ESTADO...</option>
                <option value="LIBRE">LIBRE</option>
                <option value="OCUPADO">OCUPADO</option>
                <option value="MANTENIMIENTO">MANTENIMIENTO</option>
            </select>
            <input type="hidden" id="indice">
        </td>

    </tr>

<?php
};
?>