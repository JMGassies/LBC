<?php
/**
 * Point d'entrée unique de l'application
 * - Démarre la session
 * - Analyse l'action demandée
 * - Appelle le bon contrôleur
 */

session_start(); // Gestion de session

require_once 'BDD/database.php';
require_once 'controleurs/HomeControleur.php';
require_once 'controleurs/AnnonceControleur.php';
require_once 'controleurs/UtilisateurControleur.php';

// Récupère l'action demandée dans l'URL
$action = $_GET['action'] ?? 'home';

switch ($action) {

    case 'home':
        (new HomeControleur())->index();
        break;

    case 'login':
        (new UtilisateurControleur())->login();
        break;

    case 'logout':
        session_destroy();               // Déconnexion
        header('Location: index.php');
        exit;

    case 'addAnnonce':
        (new AnnonceControleur())->add();
        break;

    case 'deleteAnnonce':
        if (isset($_GET['id'])) {
            (new AnnonceControleur())->delete($_GET['id']);
        }
        break;

    case 'genre':
        if (isset($_GET['type'])) {
            (new AnnonceControleur())->genre($_GET['type']);
        }
        break;

    case 'admin':
        (new UtilisateurControleur())->admin();
        break;

    case 'deleteUser': // suppression d'un utilisateur
        if (isset($_GET['id'])) {
            (new UtilisateurControleur())->delete($_GET['id']);
        }
        break;

    default:
        echo "<h1>Page introuvable</h1>";
}