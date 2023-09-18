<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  require("conexion.php");

  $conexion = conexion();

  $registros = mysqli_query($conexion, "SELECT * FROM usuarios");
  
  // RECORRE EL RESULTADO Y LO GUARDA EN UN ARRAY
  while ($resultado = mysqli_fetch_array($registros))  
  {
    $datos[] = $resultado;
  }

  // GENERA EL JSON CON LOS DATOS OBTENIDOS
  $json = json_encode($datos);
  
  echo $json;
  
  header('Content-Type: application/json');
?>