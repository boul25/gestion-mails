<?php
/**
 * Fichier       : Emailbase.php
 * Sujet         : Class abstraite pour définir les mails
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-05-04
 * Dernière mod. : 2025-05-15
 *
 * Description   : factorise les méthodes d'accès aux tables
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
/**
 * fonction qui retourne un enregistrement avec son id
 *
 * @param integer $id
 * @return array
 */
    public function getById(int $id) : array {
        $conn=Database::getConnection();
        $sql ="SELECT * FROM ".$this->getTablename()." WHERE ". $this->getIdTable() ." = :id";
        $stmt=$conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
/**
 * fonction qui update
 *
 * @param integer $id
 * @param array $data
 * @return array
 */

    public function update(int $id, array $data): bool    {
        unset($data[$this->getIdTable()]);
        $columns = array_keys($data);
        $fields = array_map(fn($col) => "$col = :$col", $columns);
        $sql = "UPDATE {$this->getTablename()} SET " . implode(', ', $fields) .
            " WHERE {$this->getIdTable()} = :id";

        $data['id'] = $id;

        $stmt = Database::getConnection()->prepare($sql);
        return $stmt->execute($data);
    }
/**
 * fonction qui delete
 *
 * @param integer $id
 * @return bool
 */
    public function delete(int $id) : bool {
        $conn=Database::getConnection();
        $sql="DELETE FROM {$this->getTablename()} WHERE {$this->getIdTable()} = :id";
        $data['id'] = $id;
        $stmt =$conn->prepare($sql);
        return $stmt->execute($data);
    }
/**
 * foncion qui add
 * 
 * @param array $data
 * @return bool
 */
    public function add($data) : bool {
        return true;
    }
}