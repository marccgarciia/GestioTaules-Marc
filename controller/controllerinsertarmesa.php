<?php  
	// if (!isset($_POST['oculto'])) {
	// 	exit();
	// }

	// include '../config/conexion.php';
	// $nombre = $_POST['nombre'];
	// $sala = $_POST['sala'];
	// $foto = $_POST['foto'];

	// if (!empty($nombre && $sala)) {

	// //$sentencia = $bd->prepare("INSERT INTO tbl_camareros(nombre,correo,contrasenya) VALUES (?,?,?);");
	// $sentencia = $bd->prepare("INSERT INTO `tbl_mesa`(`nombre_m`, `id_sala`, `img`) VALUES (?,?,?)");

	// $resultado = $sentencia->execute([$nombre,$sala,$foto]);

	// if ($resultado === TRUE) {
	// 	//echo "Insertado correctamente";
	// 	header('Location: ../view/indexadmin.php');
	// }else{
	// 	echo "Error";
	// }

	//   } else {
	// 	echo "¡Campos vacios!";
	//   }

?>







<?php
if(isset($_POST["submit"])){
    $revisar = getimagesize($_FILES["foto"]["tmp_name"]);

    if($revisar !== false){
        $image = $_FILES['foto']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        
        //Credenciales Mysql
		include '../config/conexion.php';

        // Cerciorar la conexion
        if($bd->connect_error){
            die("Connection failed: " . $bd->connect_error);
        }
        
        
        //Insertar imagen en la base de datos
        $insertar = $bd->query("INSERT INTO tbl_mesa (nombre_m, estado, id_sala, img) VALUES ('test', 'PRUEBA', 1, $imgContenido)");
        // COndicional para verificar la subida del fichero
        if($insertar){
            echo "Archivo Subido Correctamente.";
        }else{
            echo "Ha fallado la subida, reintente nuevamente.";
        } 
        // Sie el usuario no selecciona ninguna imagen
    }else{
        echo "Por favor seleccione imagen a subir.";
    }
}