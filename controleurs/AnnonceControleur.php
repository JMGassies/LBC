<?php
require_once 'modeles/Annonce.php';
require_once 'modeles/Upload.php';

class AnnonceControleur {

    public function add() {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit;
        }

        if ($_POST) {
            $photo = Upload::image($_FILES['photo']);

            Annonce::create([
                'titre' => $_POST['titre'],
                'description' => $_POST['description'],
                'prix' => $_POST['prix'],
                'genre' => $_POST['genre'],
                'photo' => $photo,
                'id_user' => $_SESSION['user']['ID_User']
            ]);

            header('Location: index.php');
            exit;
        }

        require 'vues/add_annonce.php';
    }

    public function delete($id) {
        Annonce::delete($id);
        header('Location: index.php');
        exit;
    }

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