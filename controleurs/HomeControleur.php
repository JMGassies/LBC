<?php
/**
 * Gère l'affichage de la page d'accueil
 */


require_once 'modeles/Annonce.php';

//  Page d'accueil

class HomeControleur {
    public function index() {
        if (isset($_SESSION['user'])) {
// Récupère toutes les annonces
    $annonces = Annonce::getAllByUser($_SESSION['user']['ID_User']);
        } else {
    $annonces = Annonce::getAll();
    }

        require 'vues/home.php';       // Charge la vue
    }
}
?>