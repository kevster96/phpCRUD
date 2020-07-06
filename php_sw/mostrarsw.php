<?php

define("HOST","127.0.0.1:3307");
 define("DB","farmacia_bd");
 define("USER","root");
 define("PASS","");

 $json = array();
 
 $conexion = mysqli_connect(HOST,USER,PASS,DB);

 $consulta_mostrar ="SELECT * FROM medicamento";

$resultado_consulta = mysqli_query($conexion, $consulta_mostrar);

if($resultado_consulta == true){

    while($registro = mysqli_fetch_array($resultado_consulta)){

        $json["medicamentos"][]= $registro;

    }
    echo json_encode($json);
  // echo '<pre>';
  // print_r($json);
  // echo '</pre>';
    mysqli_close($conexion);

}

else{
    $resultante["id"]="ERROR";
    $resultante["nombre_medicamento"]="ERROR";
    $resultante["cantidad"]="ERROR";
    $resultante["precio"]="ERROR";
    $resultante["fecha_vencimiento"]="ERROR";
       
    $jsonArray["medicamento"][]=$resultante;
    
     echo json_encode($json);
    
    }
?>