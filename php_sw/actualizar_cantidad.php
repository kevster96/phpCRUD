<?php

 define("HOST","127.0.0.1:3307");
 define("DB","farmacia_bd");
 define("USER","root");
 define("PASS","");

 //contendra informacion que sera trasladada por medio de un array JSON
 $jsonArray = array();

//isset este comprueba si una variable esta definida

if(isset($_GET["id_medicamento"])
&& isset($_GET["cantidad"])
){

    $id_medicamento=$_GET["id_medicamento"];
    $cantidad =$_GET["cantidad"];


$conexion =mysqli_connect(HOST,USER,PASS,DB);


$actualizar="UPDATE medicamento SET  cantidad ={$cantidad} WHERE id={$id_medicamento};";

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

$resultante["cantidad"]="ERROR";
$jsonArray["medicamento"]=$resultante;

 echo json_encode($jsonArray);

}



?>