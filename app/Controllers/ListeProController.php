<?php
/**
 * Fichier       : ListeProController.php
 * Sujet         : Controlleur pour le listing pro
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-05-01
 * Dernière mod. : 2025-05-07
 *
 * Description   : connection à la base, requete, charge la vue
 */
namespace App\Controllers;
use App\Models\Emailpro;

class ListeProController {

    public function listeMailpro() {
        $pagination=$_GET['pagination'] ?? 0;
        $emailpro= new Emailpro();
        $liste=$emailpro->getAll($pagination);
        $total=$emailpro->getNombre();
        require __DIR__.'/../Views/liste_pro.php';

    }

    public function loadFormpro(int $id) {
        
        $dataobj= new Emailpro();
        $data=$dataobj->getById($id);
        require  __DIR__.'/../Views/formupdatepro.php';
    }
}