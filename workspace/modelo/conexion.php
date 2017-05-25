<?php

class Conexion {

    private $server;
    private $user;
    private $pw;
    private $database;
    public $conexion;

    
    public function __construct() {
        $this->server = "127.0.0.1";
        $this->user = "root";
        $this->pw = "";
        $this->database = "c9";
    }
    
    //funcion que realiza la conexion
    public function conectar() {
        $this->conexion = new mysqli($this->server, $this->user, $this->pw, $this->database);

        if ($this->conexion->connect_errno) {
            die("No se pudo realizar la conexion: (" . $this->conexion->connect_errno . ")");
        }
    }

    //funcion que cierra la conexion
    public function cerrar() {
        $this->conexion->close();
    }
    
    public function loguearse($user, $pass){

        //$consulta = "SELECT * FROM administrador WHERE usuario='$user' AND contrasena='$pass'";
        $consulta = "SELECT usuario, rol FROM administrador WHERE usuario = '$user' AND contrasena = '$pass'";
        $rs = $this->conexion->query($consulta);
        
        if (isset($rs)) {
            if (mysqli_num_rows($rs) > 0) {
               
                $datos = mysqli_fetch_object($rs);
                return $datos;
            }else {

                return new stdClass();
            }
        } else {

            return new stdClass();
        }
    }
    
    
    //registrar
    
    public function registrar($usuario,$contrasena){
        $resultado = null;
        
        $reg = "INSERT INTO administrador values(NULL,'$usuario','$contrasena','0')";
        $rs = $this->conexion->query($reg);
        
        if($rs){
            $resultado = true;
        }else{
            $resultado = null;
        }
        return $resultado;
    }
    
    
    
    //MOSTRAR TABLAS
    
    public function mostrar(){
        
        $contN=0;
        $sql = "SELECT * FROM horarios_lab";
        $rs = $this->conexion->query($sql);
        
        if(mysqli_num_rows($rs) > 0){
            while($mostrar = mysqli_fetch_array($rs)){
                $contN++;
                echo '<tbody>';
                echo '<tr>';
                echo '<td>'.$contN.'</td>';
                echo '<td>'.$mostrar[1].'</td>';
                echo '<td>'.$mostrar[2].'</td>';
                echo '<td>'.$mostrar[3].'</td>';
                echo '<td>'.$mostrar[4].'</td>';
                echo '</tr>';
                echo '</tbody>';
            }
        }else{
            echo '<td colspan="5"> No Hay Registro de Laboratorio</td>';
        }
    }
    
     public function mostrarAdmin(){
        
        $contN=0;
        $sql = "SELECT * FROM horarios_lab";
        $rs = $this->conexion->query($sql);
        
        if(mysqli_num_rows($rs) > 0){
            while($mostrar = mysqli_fetch_array($rs)){
                $contN++;
                echo '<tbody>';
                echo '<tr>';
                echo '<td>'.$contN.'</td>';
                echo '<td>'.$mostrar[1].'</td>';
                echo '<td>'.$mostrar[2].'</td>';
                echo '<td>'.$mostrar[3].'</td>';
                echo '<td>'.$mostrar[4].'</td>';
                echo '<td><button class="btn btn-danger">Elimar</button></td>';
                echo '</tr>';
                echo '</tbody>';
            }
        }else{
            echo '<td colspan="5"> Existen laboratorios disponibles</td>';
        }
    }
    

}
?>

