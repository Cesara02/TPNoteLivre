<?php 
    class user {
        private $id_;
        private $login_;
        private $isAdmin_ = false;
        //private $password_

        public function __construct($id,$isAdmin,$login) {
            $this->id_ = $id;
            $this->isAdmin_ = $isAdmin;
            $this->login_ = $login;
        }

        public function seConnecter($login, $password) {
            $SQL = "SELECT * FROM `user` WHERE `login` = '".$_POST['login']."' AND `password` = '".$_POST['password']."';";

            $result = $GLOBALS["pdo"]->query($SQL);
                if ($result->rowCount()>0) {
                    //echo "Vous êtes connecté !";
                    $_SESSION['Connexion'] = true;
                    return true;
                } else {
                    echo "Nom d'utilisateur ou mot de passe incorrect !";
                    return false;
                }
        }

        public function seDeconnecter() {
            session_unset();
            session_destroy();
        }
    }
?>