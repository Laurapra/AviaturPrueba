<?php 
    include("db.php");
    include("includes/header.php");
    $id = $_GET['id'];
    $query="UPDATE ingreso SET salida=current_timestamp() WHERE id='$id'";
    $result= mysqli_query($conn, $query);
    if (!$result){
        die("Query Failed");
    }
    $query= "SELECT ingreso.id, placa, registro, salida, precio FROM ingreso INNER JOIN tipos ON ingreso.idTipos = tipos.id WHERE ingreso.id=".(int)$id;
    $result_registro= mysqli_query($conn, $query)or die (mysqli_error());
    $data = [];
    while($row= mysqli_fetch_array($result_registro)){
        array_push($data,$row);
    }
        $fecha1= $data[0]['registro'];
        $fecha2= $data[0]['salida'];
        $precio = $data[0]['precio'];
        function minutosTranscurridos($fecha1, $fecha2){
            $minutos= (strtotime($fecha1)- strtotime($fecha2))/60;
            $minutos= abs($minutos); $minutos = floor($minutos);
            return $minutos;
        }
?>
    <div class="container p-4">
        <div class="col-md-4">

        <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">FACTURA</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><label> Fecha de entrada: <?=$fecha1 ?></label></li>
    <li class="list-group-item"><label>Fecha de salida: <?=$fecha2 ?></label></li>
  </ul>
  <div class="card-body">
  <label>TOTAL A PAGAR: <?=(minutosTranscurridos($fecha1,$fecha2)*$precio); ?> PESOS COP</>
  </div>
  <a href="index.php">
  <input type="submit" class="btn btn-success btn-block"  value="Inicio">
  </a>
</div>
<?php 
include("includes/footer.php")
?>