<?php 

include('../config/config.php');
include('paciente.php');

$p = new paciente();
$dp = mysqli_fetch_object($p->get0ne($_GET['id']));

$date = new DateTime($dp->fecha);

if (isset($_POST) && !empty($_POST)){
    $_POST['imagen'] = $dp->imagen;
    if ( $_FILES['imagen'] ['name'] !== '' ){
        $_POST['imagen'] = saveImage($_FILES);
    }

    $update = $p->update($_POST);
    if ($update){
        $mensaje = '<div class="alert alert-success" role="alert" > Sesión Modificada con Exito. </div>';
    }else{
        $mensaje = '<div class="alert alert-danger" role="alert" > Error </div>';
    }
}



?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UFT-8" />
        <title> Modificar Sesión </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php include('../menu.php') ?>
    <div class="container">
        <?php 
        if(isset ($mensaje)){
            echo $mensaje;
        }
        ?>
        <h2 class="text-center mb-2" > Modificar Sesión </h2>
        <form method="POST" enctype="multipart/form-data" >

        <div class="row mb-2" >
            <div class="col" >
                <input type="text" name="nombres" id="nombres" placeholder="Nombres del Paciente" class="form-control" value="<?= $dp->nombres ?>" />
                <input type="hidden" name="id" value="<?= $dp->id ?>" />
            </div>
            <div class="col" >
                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos del Paciente" class="form-control" value="<?= $dp->apellidos ?>" />
            </div>
        </div>

        <div class="row mb-2" >
            <div class="col" >
                <input type="email" name="email" id="email" placeholder="Correo del Paciente" class="form-control" value="<?= $dp->email ?>" />
            </div>
            <div class="col" >
                <input type="number" name="celular" id="celular" placeholder="celular del Paciente" class="form-control" value="<?= $dp->celular ?>" />
            </div>
        </div>

        
        <div class="row mb-2" >
            <div class="col" >
                <textarea id="observaciones" name="observaciones" placeholder="observaciones del paciente" class="form-control"> <?= $dp->observaciones ?> </textarea>
            </div>
            <div class="col" >
                <input type="text" name="Duracionsesion" id="Duracionsesion" placeholder="Duración de la Sesión" class="form-control" value="<?= $dp->Duracionsesion ?>" />
            </div>
        </div>

        <div class="row mb-2" >
            <div class="col" >
                <input type="datetime-local" name="fecha" id="fecha" class="form-control"  value="<?= $date->format('Y-m-d\TH:i') ?>"  />
            </div>
            <div class="col" >
                <input type="file" name="imagen" id="imagen" class="form-control" />
            </div>
        </div>
        <button class="btn btn-success"> Modificar  </button>
        </form>
    </div>
</body>
</html>