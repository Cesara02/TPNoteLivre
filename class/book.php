<?php 
    class book {
        private $id_;
        private $titre_;
        private $auteur_;
        private $image_;

        public function __construct($id,$titre,$auteur,$image) {
            $this->id_ = $id;
            $this->titre_ = $titre;
            $this->auteur_ = $auteur;
            $this->image_ = $image;
        }

        public function setFilmbyID($id) {

        }

        public function getAllBook() {
            $BookList = array();

            $SQL = "SELECT * FROM `book`";

            $result = $GLOBALS["pdo"]->query($SQL);
            while($tab=$result->fetch()) {
                $book = new book($tab['id'],$tab['titre'],$tab['auteur'],$tab['image']);
                array_push($BookList,$book);
            }

            return $BookList;
        }

        public function getTitre() {
            return $this->titre_;
        }

        public function getAuteur() {
            return $this->auteur_;
        }

        public function renderHTML() {
            echo "<li>";
            echo $this->titre_;
            echo $this->auteur_;
            echo $this->getImage();
            echo "</li>";
        }

        public function getImage() {
            $imageHTML = '<img src="'.$this->image_.'"alt = "'.$this->titre_.'"/>';
            return $imageHTML;
        }
    }
?>