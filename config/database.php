<?php 

class database{
    public $host = 'localhost'; //servidor
    public $user = 'root'; //usuario de phpmyadmin
    public $pass = ''; // contraseña de phpmyadmin
    public $db = 'sesiones'; //base de dtos
    public $conexion;

    function connectToDatabase(){
        $this->conexion = mysqli_connect( $this->host, $this->user, $this->pass, $this->db );

        if ( mysqli_connect_error() ){
            echo ' Error de conexión ' . mysqli_connect_error();
        }

        return $this->conexion;
    }

}

?>