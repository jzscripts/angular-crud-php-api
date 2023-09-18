<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  // IMPORTA EL ARCHIVO CON LA CONEXION A LA DB
  require("conexion.php");

  // CREA LA CONEXION
  $conexion = conexion();
  
  // REALIZA LA QUERY A LA DB
  mysqli_query($conexion, "DELETE FROM usuarios WHERE idUsuario=$_GET[idUsuario]");  
  
  class Result {}

  // GENERA LOS DATOS DE RESPUESTA
  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'EL USUARIO SE ELIMINO EXITOSAMENTE';

  header('Content-Type: application/json');

  // MUESTRA EL JSON GENERADO
  echo json_encode($response);
?>