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

                    $tab = $result->fetch();
                    $_SESSION['Connexion'] = true;
                    $_SESSION['id'] = $tab['id'];
                    
                    $this->id_ = $tab['id'];
                    $this->isAdmin_ = $tab['isAdmin'];
                    $this->login_ = $tab['login'];

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

        public function isAdmin() {
            return $this->isAdmin_;
        }

        public function getLogin() {
            return $this->login_;
        }

        public function setUserByID($id) {
            $SQL = "SELECT * FROM `user` WHERE `id` = '".$id."'";

            $result = $GLOBALS["pdo"]->query($SQL);
                if ($result->rowCount()>0) {
                    $tab = $result->fetch();
                    
                    $this->id_ = $tab['id'];
                    $this->isAdmin_ = $tab['isAdmin'];
                    $this->login_ = $tab['login'];
                    return true;

                } else {
                    return false;
                }
        }
    }
?>