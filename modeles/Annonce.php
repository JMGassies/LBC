<?php
/**
 * Modèle Annonce
 * Gère toutes les requêtes sur les annonces
 */

class Annonce {

// affiche toutes les annonces

    public static function getAll() {
        $db = Database::getConnection();
        $sql = "SELECT a.*, u.Pseudo_User, u.Mail
                FROM annonce a
                JOIN utilisateur u ON a.ID_User = u.ID_User
                ORDER BY Date_Annonce DESC";
        return $db->query($sql)->fetchAll();
    }

    // affiche les annonces par genre

    public static function getByGenre($genre) {
        $db = Database::getConnection();
        $reponse = $db->prepare(
            "SELECT a.*, u.Pseudo_User, u.Mail
             FROM annonce a
             JOIN utilisateur u ON a.ID_User = u.ID_User
             WHERE Genre = ?
             ORDER BY Date_Annonce DESC"
        );
        $reponse->execute([$genre]);
        return $reponse->fetchAll();
    }

    // crée une nouvelle annonce

    public static function create($data) {
        $db = Database::getConnection();
        $reponse = $db->prepare(
            "INSERT INTO annonce
            (Titre, Description, Prix, Genre, Photo, Date_Annonce, ID_User)
            VALUES (?, ?, ?, ?, ?, NOW(), ?)"
        );
        return $reponse->execute([
            $data['titre'],
            $data['description'],
            $data['prix'],
            $data['genre'],
            $data['photo'],
            $data['id_user']
        ]);
    }

    // supprime une annonce

    public static function delete($id) {
        $db = Database::getConnection();
        $reponse = $db->prepare("DELETE FROM annonce WHERE ID_Annonce = ?");
        return $reponse->execute([$id]);
    }

    // affiche les annonces d'un utilisateur

    public static function getAllByUser($idUser) {
    $db = Database::getConnection();
    $reponse = $db->prepare(
        "SELECT a.*, u.Pseudo_User, u.Mail
         FROM annonce a
         JOIN utilisateur u ON a.ID_User = u.ID_User
         WHERE a.ID_User = ?
         ORDER BY Date_Annonce DESC"
    );
    $reponse->execute([$idUser]);
    return $reponse->fetchAll();
}

// affiche les annonces d'un utilisateur par genre

public static function getByGenreAndUser($genre, $idUser) {
    $db = Database::getConnection();
    $reponse = $db->prepare(
        "SELECT a.*, u.Pseudo_User, u.Mail
         FROM annonce a
         JOIN utilisateur u ON a.ID_User = u.ID_User
         WHERE a.Genre = ? AND a.ID_User = ?
         ORDER BY Date_Annonce DESC"
    );
    $reponse->execute([$genre, $idUser]);
    return $reponse->fetchAll();
}

}
?>