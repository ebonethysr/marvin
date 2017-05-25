<?php

include '../modelo/conexion.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['password'];

$resul = false;
$conexion = new Conexion();
$conexion ->conectar();
$resul = $conexion ->registrar($usuario,$contrasena);
$conexion ->cerrar();

echo json_encode(array("isTrue"=>$resul))

                                
?>