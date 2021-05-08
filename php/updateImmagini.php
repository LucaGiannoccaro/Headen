<?php
    $nomePrimo;
    $urlPrimo;
    $nomeSecondo;
    $urlSecondo;


    $database = mysqli_connect('localhost', 'root', '', 'sitoScuola');
    if (!$database) {
        die;
    }
    $primo = mysqli_query($database, "SELECT * FROM immaginislider WHERE id = ".$_GET['primo']);

    while($row = mysqli_fetch_array($primo)){
        $nomePrimo=$row['nome'];
        $urlPrimo=$row['url'];
    }
    $secondo = mysqli_query($database, "SELECT * FROM immaginislider WHERE id = ".$_GET['secondo']);
    while($row = mysqli_fetch_array($secondo)){
        $nomeSecondo=$row['nome'];
        $urlSecondo=$row['url'];
    }
    
    mysqli_query($database, "UPDATE immaginislider SET nome = '$nomeSecondo' , url = '$urlSecondo' WHERE id =".$_GET['primo']);
    mysqli_query($database, "UPDATE immaginislider SET nome = '$nomePrimo' , url = '$urlPrimo' WHERE id =".$_GET['secondo']);   

    //     SELECT * FROM utenti WHERE id = 10

    // 

    mysqli_close($database);
    
?>