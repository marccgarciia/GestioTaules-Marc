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
    tbl_mesa.id_m LIKE '%" . $filtro . "%'
    OR nombre_m LIKE '%" . $filtro . "%'
    OR estado LIKE '%" . $filtro . "%'
    OR id_sala LIKE '%" . $filtro . "%'
    OR tbl_sala.nombre_s LIKE '%" . $filtro . "%'");

    $mesas = $sentencia->fetchAll(PDO::FETCH_OBJ);
}


$i = 1;
foreach ($mesas as $mesa) {
?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><a class="enlace" href="#openModal<?php echo $i; ?>"><?php echo $mesa->nombre_m; ?></a></td>

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
            <button type='button' class='botonedelete' onclick=Eliminar(<?php echo $mesa->id_m; ?>)>ELIMINAR</button>
        </td>
        <div id="openModal<?php echo $i; ?>" class="modalDialog">
        <div>
            <a href="#close" title="Close" class="close">X</a>
            <h2 id="titulo">Mesa <?php echo $i++; ?></h2>
            <img class="img" src="data:image/jpg;base64, <?php echo base64_encode($mesa->img); ?>">
        </div>
        
    </div>
    </tr>

<?php
};
?>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Manrope&display=swap");
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@700&display=swap');
    #titulo{
        padding: 10px 10px 20px 10px ;
    }
    .enlace{
        text-decoration: none;
        color: black;
    }
    .enlace:hover{
        color: #367CE8;
    }
    .modalDialog {
        position: fixed;
        font-family: "Manrope", sans-serif;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.8);
        z-index: 99999;
        opacity: 0;
        -webkit-transition: opacity 200ms ease-in;
        -moz-transition: opacity 200ms ease-in;
        transition: opacity 200ms ease-in;
        pointer-events: none;
    }

    .modalDialog:target {
        opacity: 1;
        pointer-events: auto;
    }

    .modalDialog>div {
        width: 30%;
        position: relative;
        margin: 10% auto;
        padding: 40px 20px 40px 20px;
        border-radius: 3px;
        background: #fff;

        -webkit-transition: opacity 200ms ease-in;
        -moz-transition: opacity 200ms ease-in;
        transition: opacity 200ms ease-in;
    }

    .close {
        background: black;
        color: white;
        line-height: 25px;
        position: absolute;
        right: -12px;
        text-align: center;
        top: -10px;
        width: 24px;
        text-decoration: none;
        font-weight: bold;
        -webkit-border-radius: 12px;
        -moz-border-radius: 12px;
        border-radius: 12px;
    }

    .close:hover {
        background: #C43030;
        color: white;
    }

    img {
        width: 200px;
        border-radius: 3px;
    }
</style>