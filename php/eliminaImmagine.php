<?php
    $database = mysqli_connect('localhost', 'root', '', 'sitoScuola');
    if (!$database) {
        die;
    }
    echo $_GET['idItem'];

    $sql="DELETE  FROM immaginislider  WHERE id = ".$_GET['idItem'];
    mysqli_query($database, $sql);
    mysqli_close($database);
    
?>