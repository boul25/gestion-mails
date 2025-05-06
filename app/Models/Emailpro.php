<?php
/**
 * Fichier       : Emailpro.php
 * Sujet         : modele pour interagir avec liste pro
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-04-25
 * Dernière mod. : 2025-05-02
 *
 * Description   : on établi les requettes
 */
namespace App\Models;

use App\Core\Database;
use App\Models\Emailbase;
use \PDO;

 class Emailpro extends Emailbase {

  public function getTablename(): string {
    return "liste_pro";
  }
  public function getIdTable(): string {
    return "id_pro";
  }
 }