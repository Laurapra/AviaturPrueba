<?php 
include("db.php");
if(isset($_POST['registro'])){
    $placa = $_POST['placa'];
    $tipos = $_POST['tipos'];
    $query=("INSERT INTO ingreso (id, placa, idTipos) VALUES (NULL, '$placa', '$tipos');");
    $result= mysqli_query($conn, $query);
    if (!$result){
        die("Query Failed");
    }

    
    header("Location: index.php");
}
?>