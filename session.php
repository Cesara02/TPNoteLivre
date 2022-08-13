<?php 
    session_start();
    include ("class/user.php");
    include ("class/book.php");
    $User1 = new user(null,null,null);

    try {
        $ipserver = "localhost";
        $nomBase = "notelivre";
        $loginBDD = "alexis";
        $passwordBDD = "alexis";

        $GLOBALS["pdo"] = new PDO('mysql:host='.$ipserver.';dbname='.$nomBase.'', $loginBDD, $passwordBDD);
        //echo "Connexion à la BDD réussi !";
    } catch (Exception $error) {
        $error->getMessage();
    }

    if(isset($_POST['Connexion'])) {
        $User1->seConnecter($_POST['login'], $_POST['password']);
    }

    if(isset($_POST['Deconnexion'])) {
        //echo "Vous êtes déconnecté.";
        $User1->seDeconnecter();
    }

    if(isset($_SESSION['Connexion']) && $_SESSION['Connexion'] == true) {

        $User1->setUserByID($_SESSION['id']);

        //echo "Vous êtes déjà connecté";
        ?>
        <form action = "" method = "post">
            <input type = "submit" name = "Deconnexion" value = "Se deconnecter"> 
        </form>
        <a href ='page2.php'> Accès à la page 2</a>
    <?php
    } else {
        //echo "Veuillez vous identifier";
    ?>
    <form action = "" method = "post">
        Login : <input type = "text" name = "login" value = "alexis" /> 
        Password : <input type = "password" name = "password" value = "alexis" /> 
        <input type = "submit" name = "Connexion"> 
    </form>
    <?php
    }
?>