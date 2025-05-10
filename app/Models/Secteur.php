<?php
/**
 * Fichier       : Secteur.php
 * Sujet         : Modèle pour interagir avec la tablea secteur
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-05-10
 * Dernière mod. : 2025-05-10
 *
 * Description   : Décrivez ce que fait ce fichier ici...
 */
namespace App\Models;

use App\Core\Database;
use \PDO;

class Secteur {

    public static function loadSecteur() : array {
        $conn=Database::getConnection();
        $sql="SELECT * FROM secteur";
        $stmt=$conn->query($sql);
        return $result=$stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}
