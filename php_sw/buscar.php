<?php

define("HOST","127.0.0.1:3307");
 define("DB","farmacia_bd");
 define("USER","root");
 define("PASS","");

 $json = array();
 
 $conexion = mysqli_connect(HOST,USER,PASS,DB);


 $id_medicamento =$_GET["id_medicamento"];



 $consulta_mostrar ="SELECT nombre_medicamento, cantidad, precio, fecha_vencimiento FROM medicamento WHERE id={$id_medicamento};";

$resultado_consulta = mysqli_query($conexion, $consulta_mostrar);

if($resultado_consulta == true){

    while($registro = mysqli_fetch_array($resultado_consulta)){

        $json["medicamentos"][]= $registro;
     //   $json["medicamentos"]= $registro;

    }
    echo json_encode($json);
    mysqli_close($conexion);

}

else{

    $resultante["nombre_medicamento"]="ERROR";
    $resultante["cantidad"]="ERROR";
    $resultante["precio"]="ERROR";
    $resultante["fecha_vencimiento"]="ERROR";
       
    $jsonArray["medicamento"][]=$resultante;
    
     echo json_encode($json);
    
    }




?>