<?php
include("db.php")?>
<?php 
    include("includes/header.php");
    $dataTypes = [];
    $queryTypes = "SELECT * FROM tipos";
    $resultTypes = mysqli_query($conn, $queryTypes) or die (mysqli_error());
    while ($rowTypes= mysqli_fetch_array($resultTypes)){
        $dataTypes[$rowTypes['id']] = $rowTypes['nombre'];
    }
?>


<div class="container p-4">
    <div class="row">
        <!--REGISTRO-->
        <div class="col-md-4">
                <!---con session_unset no muestro el mensaje de registro con exito a menos que guarde info-->
            <?php session_unset(); ?>
            <div class="card card-body">
                <form action="save.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="placa" class="form-control" placeholder="Ingrese el numero de Placa" autofocus>
                    </div>
                    <div class="form-group">
                    <select class="form-select" name="tipos">
                        <option disabled>Tipos de Vehiculos</option>
                        <?php
                            $query= "SELECT * FROM tipos";
                            $result= mysqli_query($conn, $query) or die (mysqli_error());
                            while ($row= mysqli_fetch_array($result)){
                                echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
                            }
                            ?>
                    </select>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="registro" value="Registrar">
                </form>
            </div>
        </div>
        <!--MUESTRO MI TABLA-->
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Numero de Placa</th>
                        <th>Tipo de Vehiculo</th>
                        <th>Hora de Llegada</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query= "SELECT * FROM ingreso";
                    $result_registro= mysqli_query($conn, $query);
                    while($row= mysqli_fetch_array($result_registro)){ ?>
                    <tr>
                        <td><?php echo $row['placa'] ?></td>
                        <td><?php echo $dataTypes[(int)$row['idTipos']] ?></td>
                        <td><?php echo $row['registro'] ?></td>
                        <td>
                        <form action="salir.php?id=<?php echo $row['id']?>" method="GET">
                            <input type="hidden" value="<?php echo $row['id']?>" name="id">
                            <a href="salir.php?id=<?php echo $row['id']?>">
                            <input type="submit" class="btn btn-success btn-block" name="salida" value="Salir">
                        </a>
                        </td>
                    </form>
                    </tr>
                   <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include("includes/footer.php") ?>