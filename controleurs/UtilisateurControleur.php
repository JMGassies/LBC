<?php

/**
* Gère l’authentification et l’administration
*/

require_once 'modeles/Utilisateur.php';

class UtilisateurControleur {

//  Connexion utilisateur

    public function login() {

        $erreur = null;

        if ($_POST) {
            $resultat = Utilisateur::login($_POST['mail'], $_POST['mdp']);

            if (is_array($resultat)) {
                $_SESSION['user'] = $resultat;
                header('Location: index.php');
                exit;
            }

            if ($resultat === 'email') {
                $erreur = "Adresse e-mail ou Mot de passe incorrect";
            }

            if ($resultat === 'mdp') {
                $erreur = "Adresse e-mail ou Mot de passe incorrect";
            }
        }

        require 'vues/login.php';
    }


    public function admin() {
// Vérifie que l'utilisateur est admin
        if (!isset($_SESSION['user']) || $_SESSION['user']['Role'] !== 'admin') {
            header('Location: index.php');
            exit;
        }
        $users = Utilisateur::getCompteAnnonce();

        require 'vues/admin.php';
    }

    // supprimer un utilisateur
    public function delete($id) {
        if (!isset($_SESSION['user']) || $_SESSION['user']['Role'] !== 'admin') {
            header('Location: index.php');
            exit;
        }
        Utilisateur::delete($id);
        header('Location: index.php?action=admin');
        exit;
    }
    public function confirmDelete($id) {
    // Sécurité : admin uniquement
    if (!isset($_SESSION['user']) || $_SESSION['user']['Role'] !== 'admin') {
        header('Location: index.php');
        exit;
    }

    // Récupération de l'utilisateur à supprimer
    $user = Utilisateur::getById($id);

    if (!$user) {
        header('Location: index.php?action=admin');
        exit;
    }

    require 'vues/confirm_delete_user.php';
}

}
?>