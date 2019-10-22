<?php
include("db.php");
    
if(isset($_POST['guardar'])){
    $etiqueta = $_POST['etiqueta'];
    $precio = $_POST['precio'];
    $botella = $_POST['botella'];
    $stock = $_POST['cantidad'];
    $anio= $_POST['anio'];

    echo "etiqeta = $etiqueta precio = $precio botella = $botella stock = $cantidad anio = $anio";
}

        $consulta = "INSERT INTO varietal(etiqueta, precioDeVenta, botella, anioCosecha, stock) VALUES ('$etiqueta', '$precio', '$botella', '$anio', '$stock')";

        $resultado = mysqli_query($con, $consulta); 
        
        if(!$resultado){
            die("Consulta fallida");
        }
    
    
        $_SESSION['mensaje'] = "Guardado";
        $_SESSION['mensaje_tipo'] = "success";
    
        header("Location: deposito.php");
    
?>