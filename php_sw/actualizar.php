<?php

 define("HOST","127.0.0.1:3307");
 define("DB","farmacia_bd");
 define("USER","root");
 define("PASS","");

 //contendra informacion que sera trasladada por medio de un array JSON
 $jsonArray = array();

//isset este comprueba si una variable esta definida

if(isset($_GET["nombre_medicamento"])
&& isset($_GET["cantidad"])
&& isset($_GET["precio"])
&& isset($_GET["fecha_vencimiento"])
){

    $id_medicamento=$_GET["id_medicamento"];
    $nombre_medicamento =$_GET["nombre_medicamento"];
    $cantidad =$_GET["cantidad"];
    $precio=$_GET["precio"];
    $fecha_vencimiento=$_GET["fecha_vencimiento"];
    $fechaN =strtotime($fecha_vencimiento);
    $fechaN = date('Y/m/d',$fechaN);


$conexion =mysqli_connect(HOST,USER,PASS,DB);


$actualizar="UPDATE medicamento SET nombre_medicamento='{$nombre_medicamento}', cantidad ={$cantidad}, precio={$precio}, fecha_vencimiento='{$fechaN}' WHERE id={$id_medicamento};";

//$query = mysqli_query($conexion, $insertar) or die('error' .mysqli_error($conexion));

$resultado_actualizar = mysqli_query($conexion,$actualizar);

$jsonArray["medicamento"]=$resultado_actualizar;

mysqli_close($conexion);
//echo json_encode($jsonArray);

if( json_encode($jsonArray) == true){

    echo "Datos actualizados correctamente";

}else{

    echo "Ha ocurrido un error en la insercion";

}



}else{

$resultante["nombre_medicamento"]="ERROR";
$resultante["cantidad"]="ERROR";
$resultante["precio"]="ERROR";
$resultante["fecha_vencimiento"]="ERROR";
   
$jsonArray["medicamento"]=$resultante;

 echo json_encode($jsonArray);

}



?>