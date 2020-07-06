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

    $nombre_medicamento =$_GET["nombre_medicamento"];
    $cantidad =$_GET["cantidad"];
    $precio=$_GET["precio"];
    $fecha_vencimiento=$_GET["fecha_vencimiento"];
    $fechaN =strtotime($fecha_vencimiento);
    $fechaN = date('Y/m/d',$fechaN);


$conexion =mysqli_connect(HOST,USER,PASS,DB);

$insertar ="INSERT INTO medicamento(nombre_medicamento, cantidad, precio,fecha_vencimiento)
            VALUES ('{$nombre_medicamento}',{$cantidad},{$precio},'{$fechaN}')";

//$query = mysqli_query($conexion, $insertar) or die('error' .mysqli_error($conexion));

$resultado_insertar = mysqli_query($conexion,$insertar);

$jsonArray["medicamento"]=$resultado_insertar;

mysqli_close($conexion);
//echo json_encode($jsonArray);

if( json_encode($jsonArray) == true){

    echo "Datos ingresados correctamente";

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