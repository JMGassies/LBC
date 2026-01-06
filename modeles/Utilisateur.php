<?php
/**
 * Modèle Utilisateur
 * Gère les utilisateurs (login, récupération, suppression)
 */

class Utilisateur {

    public static function login($mail, $mdp) {
        $db = Database::getConnection();
        $reponse = $db->prepare("SELECT * FROM utilisateur WHERE Mail = ?");
        $reponse->execute([$mail]);
        $user = $reponse->fetch();

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
        $reponse = $db->prepare("DELETE FROM utilisateur WHERE ID_User = ?");
        return $reponse->execute([$id]);
    }
}
?>