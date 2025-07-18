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

use \PDO;
use \PDOException;
use App\Core\Database;

 abstract class Emailbase {

    /**
     * fonction qui force à donner le nom de la table
     *
     * @return string
     */
    abstract public function getTablename() : string;
    abstract public function getIdTable() : string;
    abstract public function getColumn() : array;

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

    public  function getAll(int $pagination = 0) : array {
        $offset = $pagination * 30;
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
 * @return mixed
 */
    public function add($data) : mixed {
        
        try {
            $conn=Database::getConnection();
            $columns = array_keys($data);
            $sql ="INSERT INTO {$this->getTablename()} (" . implode(', ', $columns) . ")
            VALUES (:" . implode(', :', $columns) . ") ";
            $stmt= $conn->prepare($sql);
            return $stmt->execute($data);
            
        }
       catch (PDOException $e) {
            return " impossible d'ajouter l'enrgesitrement ".$e->getMessage();
        }
    }

    public function search(string $mot, array $colonnes, int $pagination)
    {
        $offset = $pagination * 30;
        $conn = Database::getConnection();
        $colonnes = $this->getColumn();
        // Génère : nom LIKE :mot OR entreprise LIKE :mot OR ...
        $conditions = array_map(fn($col) => "$col LIKE :mot", $colonnes);
        $where = implode(' OR ', $conditions);

        $sql = "SELECT * FROM " . $this->getTablename() . " 
                WHERE $where
                ORDER BY " . $this->getIdTable() . " DESC" . " LIMIT 30 OFFSET $offset ";

        $stmt = $conn->prepare($sql);
        $stmt->execute(['mot' => '%' . $mot . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function search_total(string $mot, array $colonnes) {
        $conn = Database::getConnection();
        $colonnes = $this->getColumn();
        $conditions = array_map(fn($col) => "$col LIKE :mot", $colonnes);
        $where = implode(' OR ', $conditions);
        $sql = "SELECT COUNT(*) as totalSearch FROM " . $this->getTablename() . "  WHERE ". $where;
        $stmt = $conn->prepare($sql);
        $stmt->execute(['mot' => '%' . $mot . '%']);
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result['totalSearch'];

        
    }
}