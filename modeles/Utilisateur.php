<?php
/**
 * Modèle Utilisateur
 * Gère les utilisateurs (login, récupération, suppression)
 */

class Utilisateur {

    public static function login($mail, $mdp) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM utilisateur WHERE Mail = ?");
        $stmt->execute([$mail]);
        $user = $stmt->fetch();

        // COMPARAISON SIMPLE (mot de passe en clair)
        if ($user && $mdp === $user['Mdp_User']) {
            return $user;
        }
        
        return false;
    }

    public static function getAll() {
        $db = Database::getConnection();
        return $db->query("SELECT * FROM utilisateur")->fetchAll();
    }

    public static function delete($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM utilisateur WHERE ID_User = ?");
        return $stmt->execute([$id]);
    }
}