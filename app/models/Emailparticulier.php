<?php
/**
 * Fichier       : Emailparticulier.php
 * Sujet         : Modele pour la table liste_particulier
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-04-26
 * Dernière mod. : 2025-04-26
 *
 * Description   : Interaction avec cette table, retourne le nombre, modifie, insertion?
 */

 class Emailparticulier {

    /**
     * fonction qui retourne le nombre d'adresse email dans la base de données
     *
     * @return integer
     */
    public static function getNombreparticuler () :int {
        $conn = Database::getConnection();
        $sql = "SELECT COUNT(*) as total FROM liste_particulier";
        $stmt = $conn->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public static function lastInsertparticulier () :array {
        $conn = Database::getConnection();
        $sql = "SELECT * FROM liste_particulier ORDER BY id_particulier DESC LIMIT 5";
        $stmt = $conn->query($sql);
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
 }