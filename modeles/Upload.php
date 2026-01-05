<?php
/**
 * Classe Upload
 * Gère l'upload d'images
 */

class Upload {

    public static function image($file) {
        if ($file['error'] === 0) {

            // Vérification de l'extension autorisée (sécurité)
            $allowed = ['jpg','jpeg','png','gif'];
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            if (!in_array($extension, $allowed)) {
                return null; // Extension non autorisée
            }

            $nom = uniqid() . '.' . $extension;

            // Déplace le fichier dans uploads
            move_uploaded_file($file['tmp_name'], 'uploads/' . $nom);

            return $nom;
        }
        return null;
    }
}
?>