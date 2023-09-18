<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  // RECIBE EL JSON DE ANGULAR
  $json = file_get_contents('php://input');
  
  // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
  $params = json_decode($json);
  
  // IMPORTA EL ARCHIVO CON LA CONEXION A LA DB
  require("conexion.php");
  
  // CREA LA CONEXION
  $conexion = conexion();
  
  // REALIZA LA QUERY A LA DB
  mysqli_query($conexion, "INSERT INTO usuarios(usuario, password, nombre, accion, estado) VALUES
                  ('$params->usuario','$params->password','$params->nombre','$params->accion','$params->estado')");
  
  class Result {}

  // GENERA LOS DATOS DE RESPUESTA
  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'SE REGISTRO EXITOSAMENTE EL USUARIO';

  header('Content-Type: application/json');

  // MUESTRA EL JSON GENERADO
  echo json_encode($response);
?>