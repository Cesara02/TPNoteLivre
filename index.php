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
        include("session.php");

        if(isset($_SESSION['Connexion'])) {
    ?>
        <h1> Index </h1>
        <span> Bienvenue <?php echo $User1->getLogin()?> </span>

        <?php
            if($User1->isAdmin()) {
                echo "Vous êtes administrateur";
            } else {
                echo "Vous êtes un simple membre";
            }
        ?>
    <?php
        }

        $book = new book(null, null, null, null);
        $BookList = $book->getAllBook();
        echo "<ul>";

        foreach ($BookList as $book) {
            $book->renderHTML();
        }
        echo "</ul>";
    ?>
</body>
</html>