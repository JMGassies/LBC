<?php
require_once 'modeles/Utilisateur.php';

class UtilisateurControleur {

    public function login() {
        if ($_POST) {
            $user = Utilisateur::login($_POST['mail'], $_POST['mdp']);
            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: index.php');
                exit;
            }
        }
        require 'vues/login.php';
    }

    public function admin() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['Role'] !== 'admin') {
            header('Location: index.php');
            exit;
        }
        $users = Utilisateur::getAll();
        require 'vues/admin.php';
    }

    // Nouvelle méthode pour supprimer un utilisateur
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