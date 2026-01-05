<?php
/**
 * Contrôleur Annonce
 * -----------------------------
 * Gère toutes les actions liées aux annonces :
 * - Ajout
 * - Suppression
 * - Filtrage par genre
 */
require_once 'modeles/Annonce.php';
require_once 'modeles/Upload.php';

class AnnonceControleur {

    // Ajout d'une nouvelle annonce

    public function add() {
    
        // Vérifie si l'utilisateur est connecté

        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit;
        }
        // Si le formulaire est soumis
        if ($_POST) {
            $photo = Upload::image($_FILES['photo']);

    // Création de l'annonce en base de données
            Annonce::create([
                'titre' => $_POST['titre'],
                'description' => $_POST['description'],
                'prix' => $_POST['prix'],
                'genre' => $_POST['genre'],
                'photo' => $photo,
                'id_user' => $_SESSION['user']['ID_User']
            ]);
    // Renvoi vers l’accueil après l’ajout
            header('Location: index.php');
            exit;
        }
    // Affiche le formulaire d'ajout
        require 'vues/add_annonce.php';
    }
    //  Suppression d'une annonce
    public function delete($id) {
        Annonce::delete($id);
        header('Location: index.php');
        exit;
    }
    //  Affiche les annonces par genre
    public function genre($type) {
        if (isset($_SESSION['user'])) {
            $annonces = Annonce::getByGenreAndUser(
            $type,
            $_SESSION['user']['ID_User']
            );
        } else {
    $annonces = Annonce::getByGenre($type);
        }
        require 'vues/genre.php';
    }
}
?>