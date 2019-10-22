<?php 
include("db.php");?>
<?php 
include("includes/header.php");?>

<div class="container p-4">

    <div class="row">
        <div class="col-md-4 mx-auto">


        <?php
        if(isset($_SESSION['mensaje'])){ ?>
            <div class="alert alert-<?= $_SESSION['mensaje_tipo'];?> alert-dismissible fade show" role = "alert">
            <?= $_SESSION['mensaje']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

        <?php } session_unset();?>

        <?php

    
if(isset($_POST['guardar'])){
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cuitCuil = $_POST['cuitCuil'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];


    $consulta = "INSERT INTO cliente(nombre, apellido, cuitCuil, direccion, telefono) VALUES ('$nombre', '$apellido', '$cuitCuil', '$direccion', '$telefono')";

    $resultado = mysqli_query($con, $consulta); 
    
    if(!$resultado){
        die("Consulta fallida");
    }
    
    $_SESSION['mensaje'] = "Cliente guardado";

    $_SESSION['mensaje_tipo'] = "success";
    $_POST['nuevoId'] = mysqli_insert_id();

    header("Location: ventas.php");
}    
?>


        <div class="card car-body p-2">
            <form action="altaCliente.php" method="POST">

                <div class="form-group">
                    <label>Nombre:</label>
                    <input name="nombre" type = "text" class="form-control"
                    placeholder = "Ej.: Carlos E." autofocus>
                </div>
                <div class="form-group">
                    <label>Apellido:</label>
                    <input name="apellido" type = "text" class="form-control"
                    placeholder = "Ej.: Ortiz" >
                </div>
                
                <div class="form-group">
                    <label>DNI/CUIT/CUIL</label>
                    <input name="cuitCuil" type="text" class="form-control"
                    placeholder = "20332770304">
                </div>
                <div class="form-group">
                    <label>Direccion:</label>
                    <input name="direccion" type = "text" class="form-control"
                    placeholder = "Ej.: Paseo en libertadores piso 3 dpto 1. " >
                </div>
                <div class="form-group">
                    <label>Tel:</label>
                    <input name="telefono" type = "text" class="form-control"
                    placeholder = "Ej.: 4447489" >
                </div>
                

                <input type="submit" class= "btn btn-success btn-block" name="guardar" value="Guardar cliente">
            </form>

        </div>
        </div>
<!-- Guardamos cliente -->



<?php
include("includes/footer.php");
?>