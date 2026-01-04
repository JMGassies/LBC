<?php
/**
 * Classe Database
 * Connexion unique à la base de données via PDO
 */

class Database {

    private static $db;

    public static function getConnection() {
        if (!self::$db) {
            try {
                self::$db = new PDO(
                    "mysql:host=localhost;dbname=LBC;charset=utf8",
                    "root",
                    "",
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );
            } catch (PDOException $e) {
                die("Erreur DB : " . $e->getMessage());
            }
        }
        return self::$db;
    }
}