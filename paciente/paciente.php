<?php 

include_once('../config/config.php');
include('../config/database.php');

class paciente{

    public $conexion;

    function __construct()
    {
       $db = new database();
        $this->conexion = $db->connectToDatabase();
    }

    function save($params){
        $nombres = $params['nombres'];
        $apellidos = $params['apellidos'];
        $email = $params['email'];
        $celular = $params['celular'];
        $observaciones = $params['observaciones'];
        $Duracionsesion = $params['Duracionsesion'];
        $fecha = $params['fecha'];
        $imagen = $params['imagen'];


        $insert = " INSERT INTO pacientes VALUES (NULL, '$nombres', '$apellidos', '$email', $celular, '$observaciones', '$Duracionsesion', '$imagen', '$fecha') ";
        return mysqli_query($this->conexion, $insert);
    }


    function getAll(){
        $sql = "SELECT * FROM pacientes ORDER BY fecha ASC";
        return mysqli_query($this->conexion, $sql);
    }

    function get0ne($id)
    {
        $sql = "SELECT * FROM pacientes WHERE id = $id";
        return mysqli_query($this->conexion, $sql);
    }


    function update($params){
        $nombres = $params['nombres'];
        $apellidos = $params['apellidos'];
        $email = $params['email'];
        $celular = $params['celular'];
        $observaciones = $params['observaciones'];
        $Duracionsesion = $params['Duracionsesion'];
        $fecha = $params['fecha'];
        $imagen = $params['imagen'];
        $id = $params['id'];

        $update = "UPDATE pacientes SET nombres='$nombres', apellidos='$apellidos', email='$email', celular=$celular, observaciones='$observaciones', Duracionsesion='$Duracionsesion', fecha='$fecha', imagen='$imagen' WHERE id = $id ";
        return mysqli_query($this->conexion, $update);


    }

   function delete($id){
    $delete = " DELETE FROM pacientes WHERE id = $id ";
    return mysqli_query($this->conexion, $delete);
   }

}




?>

