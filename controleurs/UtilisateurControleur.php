<?php

/**
* Gère l’authentification et l’administration
*/

require_once 'modeles/Utilisateur.php';

class UtilisateurControleur {

//  Connexion utilisateur

    public function login() {
// Si le formulaire est soumis
        if ($_POST) {
            $user = Utilisateur::login($_POST['mail'], $_POST['mdp']);
            if ($user) {
                $_SESSION['user'] = $user; // Stocke l'utilisateur en session
                header('Location: index.php');
                exit;
            }
        }

// Affiche le formulaire de connexion
        require 'vues/login.php';
    }

    public function admin() {
// Vérifie que l'utilisateur est admin
        if (!isset($_SESSION['user']) || $_SESSION['user']['Role'] !== 'admin') {
            header('Location: index.php');
            exit;
        }
        $users = Utilisateur::getAll();
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
}
?>