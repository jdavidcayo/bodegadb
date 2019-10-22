<?php 
include("db.php");?>
<?php 
include("includes/header.php");?>

<div class="container p-4">

    <div class="row">
        <div class="col-md-4">


        <?php
        if(isset($_SESSION['mensaje'])){ ?>
            <div class="alert alert-<?= $_SESSION['mensaje_tipo'];?> alert-dismissible fade show" role = "alert">
            <?= $_SESSION['mensaje']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

        <?php } session_unset();?>

        <div class="card car-body p-2">
            <form action="saveTask.php" method="POST">
                <div class="form-group">
                    <input name="title" type = "text" class="form-control"
                    placeholder = "Ingrese tarea" autofocus>
                </div>
                <div class="form-group">
                    <input name="IDVarietal" type = "text" class="form-control"
                    placeholder = "Ingrese varietal" >
                </div>
                <div class="form-group">
                    <input name="etiqueta" type = "text" class="form-control"
                    placeholder = "Ingrese etiqueta" >
                </div>
                <div class="form-group">
                    <input name="precio" type = "text" class="form-control"
                    placeholder = "Ingrese precio" >
                </div>
                
                <div class="form-group">
                    <textarea name="description" rows="2" class="form-control"
                    placeholder = "Ingrese su texto aqui"></textarea>
                
                </div>

                <input type="submit" class= "btn btn-success btn-block" name="save_task" value="Grabar">
            </form>

        </div>
        </div>

        <div class="col-md-8">
            <table class= "table table-bordered">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Creado</th> 
                    <th>Acciones</th>
                    </tr>
                </thead>
                    <?php
                    $consulta = "SELECT * FROM tareas";
                    $resultados = mysqli_query($con,$consulta);

                    while($fila = mysqli_fetch_array($resultados)){ ?>
                        <tr>
                            <td><?php echo $fila['ID'];?></td>
                            <td><?php echo $fila['titulo'];?></td>
                            <td><?php echo $fila['descripcion'];?></td>
                            <td><?php echo $fila['CreadoEl'];?></td>
                            <td>
                                <a href="editTask.php?id=<?=$fila['ID']?>">
                                Editar
                                </a>
                                <a href="deleteTask.php?id=<?=$fila['ID']?>">
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



