<?php
/**
 * Fichier       : Database.php
 * Sujet         : Classe qui va renvoyer l'objet de connection
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-04-20
 * Dernière mod. : 2025-05-01
 *
 * Description   : C'est une classe singleton qui se connecte a la base de données
 * 
 */
namespace App\Core;

use \PDO;
use \PDOException;

class Database {

    static $db;

    public static function  getConnection() {
        $setting = $GLOBALS['setting'];
        try{
            if(!self::$db){
                self::$db = new PDO('mysql:host='.$setting['host'].';dbname='.$setting['dbname'], $setting['username'], $setting['password']);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            // on retourne la connection
            return self::$db;
        } catch(PDOException $e) {
            echo "<h1> Ereur de connection à la base </h1>" . $e->getMessage();
        }
        
    }
}