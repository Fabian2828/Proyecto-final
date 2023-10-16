<?php 

include_once('../config/config.php');
include('paciente.php');

$p = new paciente();
$data = $p->getAll();

if ( isset($_GET['id']) && !empty($_GET['id']) ){
    $remove = $p->delete($_GET['id']);
    if ($remove) {
        header('localtion: '.ROOT.'/paciente/index.php');
    }else{
        $mensaje = '<div class="alert alert-danger" role="alert" > Error al Eliminar </div>';
    }
}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset=UFT-8 />
        <title> Lista de Sesiones </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <?php include('../menu.php') ?>
        <div class="container">
            <h2 class="text-center mb-2"> Calendario </h2>
            <div class="row" >
                <?php 
                while( $pt = mysqli_fetch_object($data) ){
                    $date = $pt->fecha;
                    echo "<div class='col' >";
                    echo " <div class='border border-info p-2' > ";
                    echo "<h5> <img src='".ROOT."/images/$pt->imagen' width='50' height='50' /> $pt->nombres 
                    $pt->apellidos </h5>";
                    echo "<p> <b>Fecha:</b> ".date('D', strtotime($date) ) . " ". date('d-M-Y H:i', strtotime($date) ) . "</p>";
                    echo " <div clas='text-center'> ";
                        echo "<a class='btn btn-success' href='".ROOT."/paciente/edit.php?id=$pt->id' > Modificar </a> - <a class='btn btn-danger' href='".ROOT."/paciente/index.php?id=$pt->id'>Eliminar </a>";
                    echo " </div> ";
                    echo " </div> ";
                    echo "</div< ";

                }
                ?>

            </div>

        </div>
    </body>
</html>