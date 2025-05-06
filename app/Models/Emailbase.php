<?php
/**
 * Fichier       : Emailbase.php
 * Sujet         : Class abstraite pour définir les mails
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-05-04
 * Dernière mod. : 2025-05-04
 *
 * Description   : factorise les méthodes d'accès aux tables mail
 */
 namespace App\Models;

use App\Core\Database;
use \PDO;

 abstract class Emailbase {

    /**
     * fonction qui force à donner le nom de la table
     *
     * @return string
     */
    abstract public function getTablename() : string;
    abstract public function getIdTable() : string;

    public  function getNombre() :int {
        $conn = Database::getConnection();
        $sql = "SELECT COUNT(*) as total FROM ".$this->getTablename();
        $stmt = $conn->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public  function lastInsert() : array {
        $conn = Database::getConnection();
        $sql = "SELECT * FROM ".$this->getTablename()." ORDER BY ". $this->getIdTable()." DESC LIMIT 5";
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public  function getAll($pagination) : array {
        $offset = $pagination * 30 ?? 0;
        $conn = Database::getConnection();
        $sql = "SELECT * FROM ".$this->getTablename()." LIMIT 30 OFFSET $offset ";
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getById(int $id) : array {
        $conn=Database::getConnection();
        $sql ="SELECT * FROM ".$this->getTablename()." WHERE ". $this->getIdTable() ." = :id";
        $stmt=$conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
 }