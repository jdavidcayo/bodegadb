<?php
include("db.php");
if(isset($_GET['id'])){
    echo "llego a delete.php";
    
    $id = $_GET['id'];
    echo "<br> $id <br>";
    $consulta= "DELETE FROM cliente WHERE idCliente ='$id'";

    $resultado = mysqli_query($con, $consulta);
    if(!$resultado){
        die("Consulta fallida");
    }

    $_SESSION['mensaje']= 'Cliente borrado.';
    $_SESSION['mensaje_tipo']= 'danger';
    header("Location: altaCliente.php");
}
?>