<?php
    session_start();

    include '../modelo/conexion.php';
    
    $user = $_POST['usuario'];
    $pass = $_POST['contrasena'];
    
    $conexion = new Conexion();
    $conexion -> conectar();
    $resul = $conexion -> loguearse($user, $pass);
    $conexion ->cerrar();
    
    $_SESSION['empleado']= $resul;
    
    
    echo json_encode($resul);
?>