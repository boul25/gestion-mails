<?php
/**
 * Fichier       : Emailparticulier.php
 * Sujet         : Modele pour la table liste_particulier
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-04-26
 * Dernière mod. : 2025-05-04
 *
 * Description   : Interaction avec cette table, retourne le nombre, modifie, insertion?
 */
 namespace App\Models;

 use App\Core\Database;
 use App\Models\Emailbase;
 use \PDO;

 class Emailparticulier extends Emailbase{

    private string $table_name;
    private string $IdTable;

    /**
     * fonction qui retourne le nombre d'adresse email dans la base de données
     *
     * @return integer
     */
    public function getTablename(): string {
        return "liste_particulier";
        
    }
    public function getIdTable() : string {
        return "id_particulier";

    }
    
 }