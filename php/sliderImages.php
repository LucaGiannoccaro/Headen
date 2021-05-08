<?php
    session_start();
    $database = mysqli_connect('localhost', 'root', '', 'sitoScuola');
    if (!$database) {
        die;
    }
    $sql="SELECT * FROM immaginiSlider";
    mysqli_query($database, $sql);
    $result = mysqli_query($database,$sql);
    $array = array();
    while($var = mysqli_fetch_array($result))
        $array[] = array($var['id'], $var['nome'], $var['url']);
    mysqli_close($database);
    echo json_encode($array);
    $_SESSION['listaImmagini']=$array;
?>
