<?php
/**
 * Fichier       : ListeProController.php
 * Sujet         : Controlleur pour le listing pro
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-05-01
 * Dernière mod. : 2025-05-02
 *
 * Description   : connection à la base, requete, charge la vue
 */
namespace App\Controllers;
use App\Models\Emailpro;

class ListeProController {

    public function listeMailpro() {
        $pagination=$_GET['pagination'] ?? 0;
        $liste=Emailpro::getAllEmailpro((int)$pagination);
        $total=Emailpro::getNombrepro();
        require __DIR__.'/../Views/liste_pro.php';

    }
}