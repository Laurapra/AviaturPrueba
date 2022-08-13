<?php 
include("db.php");
    $id = $_GET['id'];
    $query="UPDATE ingreso SET salida=current_timestamp() WHERE id='$id'";
    $result= mysqli_query($conn, $query);
    if (!$result){
        die("Query Failed");
    }
    header("Location: index.php");
    //return "sdfsdf";
?>