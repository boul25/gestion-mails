<?php
/**
 * Fichier       : User.php
 * Sujet         : modele pour interroger la table user
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-04-21
 * Dernière mod. : 2025-04-21
 *
 * Description   : interroge la base et renvoir le résultat
 */

require_once __DIR__ . '/../core/Database.php';

class User {
    public static function findByLogin($email)
    {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE email_utilisateur = :login");
        $stmt->bindParam(':login', $email);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row ?: false;
    }
}