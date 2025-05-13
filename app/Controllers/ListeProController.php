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
use App\Models\Secteur;

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
        $secteur=Secteur::loadSecteur();
        require  __DIR__.'/../Views/formupdatepro.php';
    }

    public function loadFormAddpro () {
        $secteur=Secteur::loadSecteur();
        require __DIR__.'/../Views/formaddpro.php';
    }

    public function updateMailpro( int $id, array $formulaire) {
        $dataobj=new Emailpro();
        $result=$dataobj->update($id,$formulaire);
        if($result) {
            header('Location: index.php?page=listepro&success=1');
            exit;
        }
        else {
            header('Location: index.php?page=listepro&success=0');
            exit;
        }
        
    }

    public function addMailpro ( array $formulaire) {
        $dataobj=new Emailpro();
        $message=$dataobj->add($formulaire);
        if($message===true) {
            header('Location: index.php?page=listepro&success=1');
            exit;
        }
        else{
            $_SESSION['error'] = $message;
            $_SESSION['old_inputs']=$formulaire;
            header('Location: index.php?page=createpro');
            exit;
        }

    }

    public function deleteMailpro ( int $id) {
        $dataobj=new Emailpro();
        $result=$dataobj->delete($id);
        if($result) {
            header('Location: index.php?page=listepro&success=1');
            exit;
        }
        else {
            header('Location: index.php?page=listepro&success=0');
            exit;
        }

    }
}