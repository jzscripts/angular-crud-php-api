<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  $json = file_get_contents('php://input');
 
  $params = json_decode($json);
  
  require("conexion.php");

  $conexion = conexion();
  
  mysqli_query($conexion, "UPDATE usuarios
    SET usuario='$params->usuario',
      password='$params->password',
      nombre='$params->nombre',
      accion='$params->accion',
      estado='$params->estado'
    WHERE idUsuario=$params->idUsuario");
  
  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'EL USUARIO SE ACTUALIZO EXITOSAMENTE';

  header('Content-Type: application/json');

  echo json_encode($response);
?>