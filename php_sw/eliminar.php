<?php

define("HOST","127.0.0.1:3307");
 define("DB","farmacia_bd");
 define("USER","root");
 define("PASS","");

 $json = array();
 
 $conexion = mysqli_connect(HOST,USER,PASS,DB);


 $id_medicamento =$_GET["id_medicamento"];



 $consulta_eliminar ="DELETE FROM medicamento WHERE id={$id_medicamento};";

$resultado_consulta = mysqli_query($conexion, $consulta_eliminar);






?>