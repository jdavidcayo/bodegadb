<?php 
include("db.php");?>
<?php 
include("includes/header.php");?>

<div class="container p-4">
    <!-- Puto el que lea -->
    <div class="row">
        <div class="col-md-4 ">


        <?php
        if(isset($_SESSION['mensaje'])){ ?>
            <div class="alert alert-<?= $_SESSION['mensaje_tipo'];?> alert-dismissible fade show" role = "alert">
            <?= $_SESSION['mensaje']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

        <?php } session_unset();?>
        <!-- Que paso campeon? seguis aca?-->
        <div class="card car-body p-2">
            <form action="nuevoProducto.php" method="POST">
                <div class="form-group">
                    <label>Etiqueta</label>
                    <input name="etiqueta" type = "text" class="form-control"
                    placeholder = "Ej.: Malbec -Toro Viejo" autofocus>
                </div>
                <div class="form-group">
                    <label>Botella</label>
                    <input name="botella" type = "text" class="form-control"
                    placeholder = "Ej.:botella 750ml" >
                </div>
                <div class="form-group">
                    <label>Cosecha Año</label>
                    <input name="anio" type = "text" class="form-control"
                    placeholder = "Ej.:1987" >
                </div>
                <div class="form-group">
                    <label>Cantidad</label>
                    <input name="cantidad" type = "text" class="form-control"
                    placeholder = "Ej.: 10" >
                </div>
                
                <div class="form-group">
                    <label>Precio de venta</label>
                    <input name="precio" type="text" class="form-control"
                    placeholder = "$">
                
                </div>

                <input type="submit" class= "btn btn-success btn-block" name="guardar" value="Guardar producto">
            </form>

        </div>
        </div>

        <div class="col-md-8">
            <table class= "table table-bordered">
                <thead>
                <!--
	idVarietal 	añoCosecha 	etiqueta 	botella 	stock 	precioDeVenta-->
                    <tr>
                    <th>ID</th>
                    <th>Etiqeta</th>
                    <th>Botella</th>
                    <th>Cosecha</th>
                    <th>Stock</th> 
                    <th>Precio</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                    <?php
                    $consulta = "SELECT * FROM varietal";
                    $resultados = mysqli_query($con,$consulta);

                    while($fila = mysqli_fetch_array($resultados)){ ?>
                        <tr>
                            <td><?php echo $fila['idVarietal'];?></td>
                            <td><?php echo $fila['etiqueta'];?></td>
                            <td><?php echo $fila['botella'];?></td>
                            <td><?php echo $fila['anioCosecha'];?></td>
                            <td><?php echo $fila['stock'];?></td>
                            <td><?php echo $fila['precioDeVenta'];?></td>

                            <td>
                                <a href="editVarietal.php?id=<?=$fila['idVarietal']?>">
                                Editar
                                </a>
                                <a href="deleteVarietal.php?id=<?=$fila['idVarietal']?>">
                                Borrar
                                </a>
                            </td>
                        
                        </tr>
                    <?php } ?>
                <tbody>
                
                </tbody>
            </table>
        
        </div>

    </div>
</div>


<?php
include("includes/footer.php");
?>



