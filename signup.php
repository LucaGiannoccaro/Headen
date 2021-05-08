<?php

        
$errore="<h4 style='color: green;'>Registrazione avvenuta con successo!</h4>";
    if(isset($_POST['submit'])){
        $database = mysqli_connect('localhost', 'root', '', 'sitoScuola');
        if (!$database) {
            die;
        }
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $nuovaPassword = $_POST['nuovaPassword'];
        $confermaPassword = $_POST['confermaPassword'];

        
        if($nome=="")
            $errore = "<h4 style='color: red; margin-top: 4%;'>Riempire tutti i campi!</h4>";
        else if($cognome=="")
            $errore = "<h4 style='color: red; margin-top: 4%;'>Riempire tutti i campi!</h4>";
        else if($email=="")
            $errore = "<h4 style='color: red; margin-top: 4%;'>Riempire tutti i campi!</h4>";
        else if($telefono=="")
            $errore = "<h4 style='color: red; margin-top: 4%;'>Riempire tutti i campi!</h4>";
        else if($nuovaPassword=="")
            $errore = "<h4 style='color: red; margin-top: 4%;'>Riempire tutti i campi!</h4>";
        else if($confermaPassword=="")
            $errore = "<h4 style='color: red; margin-top: 4%;'>Riempire tutti i campi!</h4>";
        else if($nuovaPassword!=$confermaPassword)
            $errore = "<h4 style='color: red; margin-top: 4%;'>Le password non combaciano!</h4>";
        else{
            $users = mysqli_query($database, "SELECT * FROM utenti");
            $controllo = true;
            while($row = mysqli_fetch_array($users)){
                if($row['email'] == $email){
                    $errore="<h4 style='color: red; margin-top: 4%;'>Email già usata!</h4>";
                    $controllo=false;
                    break;
                }else if($row['telefono'] == $telefono){
                    $errore="<h4 style='color: red; margin-top: 4%;'>Numero di telefono già usato!</h4>";
                    $controllo=false;
                    break;
                }
            }
            if($controllo){
                $statement = $database->prepare("INSERT INTO utenti(nome, cognome, email, telefono, password) VALUES(?, ?, ?, ?, ?)");
                $statement->bind_param('sssss', $nome, $cognome, $email, $telefono, $nuovaPassword);
                $statement->execute();
            }

        }
        mysqli_close($database);
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova 1</title>
    <script>
        document.addEventListener('DOMContentLoaded', ()=>{
            var button = document.querySelector('#mobile-navbar-button p');
            var navbar = document.getElementById('navbar');
            button.addEventListener('click', ()=>{
                console.log(navbar.style)
                console.log(navbar.style.display)
                if(navbar.style.display == 'flex')
                    navbar.style.display = 'none';
                else 
                    navbar.style.display = 'flex';
            })
        })
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova 1</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/style.mini.css">
    </head>
    <body>
    <!-- HEADER -->
    <div class="header">
        <h1>LOGO</h1>
        <h2>placeholder</h2>
    </div>
    <!-- FINE HEADER -->

    <!-- NAVBAR -->
    <div id="mobile-navbar-button">
        <p>&#x2630</p>
    </div>
    <ul id="navbar">
        <li class="navbar-item"><a href="index.html" class="navbar-link">Home</a></li>
        <li class="navbar-item"><a href="second.html" class="navbar-link">Info</a></li>
        <li class="navbar-item"><a href="login.html" class="navbar-link">Login</a></li>
        <li class="navbar-item"><a href="signup.html" class="navbar-link active">Sign up</a></li>
        <li class="navbar-item"><a href="admin.html" class="navbar-link">Admin</a></li>
    </ul>

    <!-- FINE NAVBAR -->

   <div class="container">
       <div class="login">
            <form action="signup.php" method="POST">
                <div class="vertical">
                    
                    <div class="inline">
                        <div class="vertical">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" id="nome" placeholder="Nome">
                        </div>
                        <div class="vertical">
                            <label for="cognome">Cognome:</label>
                            <input type="text" name="cognome" id="cognome" placeholder="Cognome">
                        </div>
                    </div>
                    <div class="inline">
                        <div class="vertical">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="vertical">
                            <label for="telefono">Telefono:</label>
                            <input type="text" name="telefono" id="telefono" placeholder="Telefono">
                        </div>
                    </div>
                    <div class="inline">
                        <div class="vertical">
                            <label for="nuovaPassword">Password:</label>
                            <input type="password" name="nuovaPassword" id="nuovaPassword" placeholder="Nuova password">
                        </div>
                        <div class="vertical">
                            <label for="confermaPassword">Conferma password:</label>
                            <input type="password" name="confermaPassword" id="confermaPassword" placeholder="Conferma password">
                        </div>
                    </div>
                    <?php  echo $errore ?>
                    <input type="submit" name ="submit" class="submit">
                </div>
        </form>
        <p>Sei già registrato? Effettua il <a href="login.html">login</a></p>
       </div>
   </div>

   <hr>
    <!-- FOOTER -->
    <div class="footer">
        <p>COPYRIGHT &copy <b>2021</b></p>
        <div class="link-social">
            <a href=""><img src="immagini/instagram (1).png" class="icon"></a>
            <a href=""><img src="immagini/youtube (1).png" class="icon"></a>
            <a href=""><img src="immagini/whatsapp.png" class="icon"></a>
        </div>
        
    </div>
    <!-- FINE FOOTER -->

</body>
</html>