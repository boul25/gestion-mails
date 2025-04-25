<?php
/**
 * Fichier       : Emailpro.php
 * Sujet         : modele pour interagir avec liste pro
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-04-25
 * Dernière mod. : 2025-04-25
 *
 * Description   : on établi les requettes
 */

 class Emailpro {

    public static function getNombrepro() : int {
      $conn = Database::getConnection();
      $sql = "SELECT COUNT(*) AS total FROM liste_pro";
      $stmt = $conn->query($sql);
      $result= $stmt->fetch(PDO::FETCH_ASSOC);
      return $result['total'];
    }
 }