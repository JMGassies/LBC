<?php
require_once 'modeles/Annonce.php';

class HomeControleur {
    public function index() {
        if (isset($_SESSION['user'])) {
    $annonces = Annonce::getAllByUser($_SESSION['user']['ID_User']);
        } else {
    $annonces = Annonce::getAll();
    }

        require 'vues/home.php';       // Charge la vue
    }
}