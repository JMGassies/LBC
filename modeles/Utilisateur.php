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

        if (!$user) {
            return 'email'; // email inexistant
        }

        if ($mdp !== $user['Mdp_User']) {
            return 'mdp'; // mot de passe incorrect
        }

        return $user; // connexion réussie
    }


    public static function getAll() {
        $db = Database::getConnection();

        $reponse = $db->prepare(
            "SELECT * FROM utilisateur WHERE Role != 'admin'" // va afficher tous les utilisateurs sauf admin
        );
        $reponse->execute();

        return $reponse->fetchAll();
    }


    public static function delete($id) {
        $db = Database::getConnection();
        $reponse = $db->prepare("DELETE FROM utilisateur WHERE ID_User = ?");
        return $reponse->execute([$id]);
    }

    public static function getCompteAnnonce() {
        $db = Database::getConnection();

        $sql = "
            SELECT u.*, COUNT(a.ID_Annonce) AS nb_annonces
            FROM utilisateur u
            LEFT JOIN annonce a ON u.ID_User = a.ID_User
            WHERE u.Role != 'admin'
            GROUP BY u.ID_User
        ";

        return $db->query($sql)->fetchAll();
    }
    public static function getById($id) {
        $db = Database::getConnection();
        $reponse = $db->prepare("SELECT * FROM utilisateur WHERE ID_User = ?");
        $reponse->execute([$id]);
        return $reponse->fetch();
    }


}
?>