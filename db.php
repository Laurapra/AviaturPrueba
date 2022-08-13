<?php

session_start();

$conn =mysqli_connect(
    'localhost',
    'root',
    '',
    'carros'
);
if (isset($conn)) {
    //echo 'la base de datos esta conectada';
}
?>