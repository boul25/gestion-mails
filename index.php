<?php
/**
 * Fichier       : index.php
 * Sujet         : le futur router?
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-04-20
 * Dernière mod. : 2025-04-21
 *
 * Description   : fichier par défaut qui s'affiche 
 */
session_start();

if(@$_SESSION['login']) { //test si on est connecté
    
    if ($_GET['page'] === 'dashboard') {
        require 'app/views/dashboard.php';
    }

}

else { //sinon on test si form login evoyé ou on affiche 

    if(isset($_POST['login']) && isset($_POST['password'])) {
        require_once __DIR__.'/app/controllers/LoginController.php';
        $verification = new LoginController();
        $verification->handleLogin($_POST['login'],$_POST['password']);
    }
    else {
        require_once __DIR__ . '/app/views/login.php';
    }
}