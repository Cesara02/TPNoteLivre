<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Accueil</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <?php

    try {
        $ipserver = "localhost";
        $nomBase = "notelivre";
        $loginBDD = "alexis";
        $passwordBDD = "alexis";

        $pdo = new PDO('mysql:host='.$ipserver.';dbname='.$nomBase.'', $loginBDD, $passwordBDD);
        //echo "Connexion à la BDD réussi !";
    } catch (Exception $error) {
        $error->getMessage();
    }


    if(isset($_POST['Connexion'])) {
        $SQL = "SELECT * FROM `user` 
                WHERE 
                `login` = '".$_POST['login']."' 
                AND 
                `password` = '".$_POST['password']."';";

        $result = $pdo->query($SQL);
        if ($result->rowCount()>0) {
            echo "Vous êtes connecté !";
            $_SESSION['Connexion'] = true;
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect !";
        }
    }

    if(isset($_POST['Deconnexion'])) {
        echo "Vous êtes déconnecté.";
        session_unset();
        session_destroy();
    }

    if(isset($_SESSION['Connexion'])) {
        echo "Vous êtes déjà connecté";
        ?>
        <form action = "" method = "post">
            <input type = "submit" name = "Deconnexion" value = "Se deconnecter"> 
        </form>
    <?php
    } else {
        echo "Veuillez vous identifier";
    ?>
    <form action = "" method = "post">
        Login : <input type = "text" name = "login" value = "alexis" /> 
        Password : <input type = "password" name = "password" value = "alexis" /> 
        <input type = "submit" name = "Connexion"> 
    </form>
    <?php
    }
    ?>

</body>
</html>