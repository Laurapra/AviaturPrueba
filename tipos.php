<?php include("db.php") ?>
<?php include("includes/header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="save_tipos.php" method="POST">
                    <h5>Registra el nuevo tipo de vehiculo</h5>
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Tipo de vehiculo">
                        </div>
                                <div class="form-group">
                                     <input type="text" name="precio" class="form-control" placeholder="Precio">
                                 </div>
                                        <input type="submit" class="btn btn-success btn-block" name="registro" value="Registrar">
                </form>
            </div>
        </div>

    <div class="col-md-8">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Tipos de vehiculo</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query= "SELECT * FROM tipos";
        $result_registro = mysqli_query($conn, $query);
        //var_dump($result_registro);
        while($row= mysqli_fetch_array($result_registro)){ ?>
                <tr>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['precio'] ?></td>
                 </tr>
            <?php } ?>
        </tbody>
    </table>
        </div>
    </div> 
</div>
    
    
<?php include("includes/footer.php") ?>