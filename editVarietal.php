<?php 
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $consulta = "SELECT * FROM varietal WHERE idVarietal = $id";

        $resultado = mysqli_query($con,$consulta);
        if(mysqli_num_rows($resultado) == 1){
            $fila = mysqli_fetch_array($resultado);
            $etiqueta = $fila['etiqueta'];
            $precio = $fila['precioDeVenta'];
            $botella = $fila['botella'];
            $stock = $fila['stock'];
            $anio= $fila['anioCosecha'];
        }

    }
    if(isset($_POST['guardar'])){
        $idVarietal = $_GET['idVarietal'];
        $etiqueta = $_POST['etiqueta'];
        $botella = $_POST['botella'];
        $precioDeVenta = $_POST['precioDeVenta'];
        $stock= $_POST['stock'];
        $anioCosecha = $_POST['anioCosecha'];
        //El muy hdp no me queria imprimir los datos... o era que el sueño me llamaba a dormir...
        //echo "$idVarietal <br>$etiqueta<br>$botella<br>$precioDeVenta<br>$stock<br>$anioCosecha";
        $consulta = "UPDATE varietal set etiqueta ='$etiqueta', precioDeVenta = '$precioDeVenta', botella ='$botella',  stock = '$stock', anioCosecha = '$anioCosecha' WHERE idVarietal = '$id'";
        
        $r = mysqli_query($con, $consulta);
        if (!r){echo "algo salio mal";}

        $_SESSION['mensaje']="Actualizado corretamente";
        $_SESSION['mensaje_tipo']= "success";
        header("Location: deposito.php");
    }


?>

<?php include("includes/header.php");?>

<div class="container p-4" >
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editVarietal.php?id=<?php echo $_GET['id']?>" method="POST">
                    
                    <div class="form-group">
                        <label>Etiqueta:</label>
                        <input name="etiqueta" type = "text" class="form-control"
                        value="<?php echo $etiqueta;?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Botella:</label>
                        <input name="botella" type = "text" class="form-control"
                        value="<?php echo $botella;?>">
                    </div>
                    <div class="form-group">
                        <label>Cosecha año:</label>
                        <input name="anioCosecha" type = "text" class="form-control"
                        value="<?php echo $anio;?>"" >
                    </div>
                    <div class="form-group">
                    <label>Cantidad:</label>
                        <input name="stock" type = "text" class="form-control"
                        value="<?php echo $stock;?>" >
                    </div>
                    
                    <div class="form-group">
                    <label>Precio:</label>
                        <input name="precioDeVenta" type="text" class="form-control"
                        value="<?php echo $precio;?>" >
                    
                    </div>

                    <input type="submit" class= "btn btn-success btn-block" name="guardar" value="Guardar producto">
                </form>
            </div>
        </div>
    </div>
</div>
    

<?php include("includes/footer.php"); ?>