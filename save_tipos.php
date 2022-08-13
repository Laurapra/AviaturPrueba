<?php 
include("db.php");
var_dump('lo que sea');
if(isset($_POST['registro'])){
    $nombre = $_POST['nombre'];
    $precio = intval($_POST['precio']);

    
    $query= "INSERT INTO tipos(id, nombre, precio) VALUES (NULL, '". $nombre ."', ". $precio .")";
    $result= mysqli_query($conn, $query);
    var_dump($result);
    if (!$result){
        die("Query Failed");
    }
    header("Location: tipos.php");
}
?>