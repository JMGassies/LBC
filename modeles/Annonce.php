<?php
/**
 * Modèle Annonce
 * Gère toutes les requêtes sur les annonces
 */

class Annonce {

    public static function getAll() {
        $db = Database::getConnection();
        $sql = "SELECT a.*, u.Pseudo_User, u.Mail
                FROM annonce a
                JOIN utilisateur u ON a.ID_User = u.ID_User
                ORDER BY Date_Annonce DESC";
        return $db->query($sql)->fetchAll();
    }

    public static function getByGenre($genre) {
        $db = Database::getConnection();
        $stmt = $db->prepare(
            "SELECT a.*, u.Pseudo_User, u.Mail
             FROM annonce a
             JOIN utilisateur u ON a.ID_User = u.ID_User
             WHERE Genre = ?
             ORDER BY Date_Annonce DESC"
        );
        $stmt->execute([$genre]);
        return $stmt->fetchAll();
    }

    public static function create($data) {
        $db = Database::getConnection();
        $stmt = $db->prepare(
            "INSERT INTO annonce
            (Titre, Description, Prix, Genre, Photo, Date_Annonce, ID_User)
            VALUES (?, ?, ?, ?, ?, NOW(), ?)"
        );
        return $stmt->execute([
            $data['titre'],
            $data['description'],
            $data['prix'],
            $data['genre'],
            $data['photo'],
            $data['id_user']
        ]);
    }

    public static function delete($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM annonce WHERE ID_Annonce = ?");
        return $stmt->execute([$id]);
    }

    public static function getAllByUser($idUser) {
    $db = Database::getConnection();
    $stmt = $db->prepare(
        "SELECT a.*, u.Pseudo_User, u.Mail
         FROM annonce a
         JOIN utilisateur u ON a.ID_User = u.ID_User
         WHERE a.ID_User = ?
         ORDER BY Date_Annonce DESC"
    );
    $stmt->execute([$idUser]);
    return $stmt->fetchAll();
}

public static function getByGenreAndUser($genre, $idUser) {
    $db = Database::getConnection();
    $stmt = $db->prepare(
        "SELECT a.*, u.Pseudo_User, u.Mail
         FROM annonce a
         JOIN utilisateur u ON a.ID_User = u.ID_User
         WHERE a.Genre = ? AND a.ID_User = ?
         ORDER BY Date_Annonce DESC"
    );
    $stmt->execute([$genre, $idUser]);
    return $stmt->fetchAll();
}

}