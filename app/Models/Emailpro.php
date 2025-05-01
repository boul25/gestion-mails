<?php
/**
 * Fichier       : Emailpro.php
 * Sujet         : modele pour interagir avec liste pro
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-04-25
 * Dernière mod. : 2025-05-01
 *
 * Description   : on établi les requettes
 */
namespace App\Models;

use App\Core\Database;
use \PDO;

 class Emailpro {

    public static function getNombrepro() : int {
      $conn = Database::getConnection();
      $sql = "SELECT COUNT(*) AS total FROM liste_pro";
      $stmt = $conn->query($sql);
      $result= $stmt->fetch(PDO::FETCH_ASSOC);
      return $result['total'];
    }

    public static function lastRecordpro() : array {
      $conn = Database::getConnection();
      $sql ="SELECT * FROM liste_pro ORDER by id_pro DESC LIMIT 5";
      $stmt = $conn->query($sql);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }
 }