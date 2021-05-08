<?php
$cartellaDestinazione = "../immagini/slider/";
$target_file = $cartellaDestinazione.basename($_FILES["fileToUpload"]["name"]);
echo $_FILES["fileToUpload"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }else {
        echo "File is not an image.";
         $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
}else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

        $database = mysqli_connect('localhost', 'root', '', 'sitoScuola');
        if (!$database) {
            die;
        }
        $nome = $_POST["nome"];
        $url = 'immagini/slider/'.$_FILES["fileToUpload"]["name"];
        $sql="INSERT INTO immaginislider(id, nome , url) VALUES('', '$nome', '$url')";
        mysqli_query($database, $sql);
        mysqli_close($database);
    }else {
        echo "Sorry, there was an error uploading your file.";
    }
}

header("location: ../index.html");
?>