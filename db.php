<?php

session_start();

$conn =mysqli_connect(
    'localhost',
    'root',
    'Laura2410',
    'carros'
);
if (isset($conn)) {
    //echo 'la base de datos esta conectada';
}
?>
