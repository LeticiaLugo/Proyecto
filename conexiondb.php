<?php
    $conexion = new mysqli("localhost","root","","test");
    if(mysqli_connect_errno()){
        echo 'Conexion Fallida : ', mysqli_connect_error(); //imprime mensaje y tipo de error.
        exit();
    }
?>