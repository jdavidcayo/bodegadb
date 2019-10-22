<?php
include("db.php");
if(isset($_GET['id'])){
    echo "llego a delete.php";
    
    $id = $_GET['id'];
    echo "<br> $id <br>";
    $consulta= "DELETE FROM varietal WHERE idVarietal ='$id'";

    $resultado = mysqli_query($con, $consulta);
    if(!$resultado){
        die("Consulta fallida");
    }

    $_SESSION['mensaje']= 'Producto eliminado.';
    $_SESSION['mensaje_tipo']= 'danger';
    header("Location: deposito.php");
}
?>