<?php 
include("db.php");?>
<?php 
include("includes/header.php");?>

<div class="container p-4">

    <div class="row">
        <div class="col-md-4">


        <?php
        if(isset($_SESSION['mensaje'])){
                
        ?>
            <div class="alert alert-<?= $_SESSION['mensaje_tipo'];?> alert-dismissible fade show" role = "alert">
            <?= $_SESSION['mensaje']?>
            
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

        <?php } 
       
        session_unset();?>

        <div class="card card-body p-2">
        
            <form action="altaCliente.php" method="POST">
                <div class="form-group">
                    <input type="submit" class= "btn btn-success btn-block" name="nuevoCliente" value="Nuevo cliente">    
                </div>
            </form>
        


        <div class="card card-body p-2">
            <form  action="ventas.php" method="POST">
                <div class="form-group">
                <select class="btn btn-info btn-block dropdown-toggle" name="cliente">
                <?php

                $consulta = "SELECT * FROM cliente";
                $resultado = mysqli_query($con, $consulta);

                if(!$resultado) echo "Fallo la consulta";
                else{
                    

                    while($cliente = mysqli_fetch_array($resultado)){
                        $id = $cliente['idCliente'];
                        $nombre = $cliente['nombre'];
                        $apellido = $cliente['apellido'];
                ?>
                        <option  value="<?php echo $id;?>"><?php echo "$nombre $apellido"?></option>
                
                <?php    }
                }
                ?>
                </select>

                <select class="btn btn-info btn-block" name="varietal">
                <?php

                $consulta = "SELECT * FROM varietal";
                $resultado = mysqli_query($con, $consulta);

                if(!$resultado) echo "Fallo la consulta";
                else{
                    

                    while($varietal = mysqli_fetch_array($resultado)){
                        $idVarietal = $varietal['idVarietal'];
                        $varietal = $varietal['etiqueta'];
                        $botella = $varietal['botella'];
                ?>
                        <option value="<?php echo $idVarietal;?>"><?php echo "$varietal $botella";?></option>
                
                <?php    }
                }
                ?>
                </select>

            </div>
        </form>
        </div>
    
<?php
/*$id = mysqli_insert_id($con);
if($id){
$nconsulta = "SELECT * FROM cliente WHERE idCliente = '$id'";
$resultado = mysqli_query($con, $nconsulta);
if(!$resultado) echo "Algo salio mal x2";
else echo "Ok!";
}*/
?>

<?php
include("includes/footer.php");
?>



