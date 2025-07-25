<?php
/**
 * Fichier       : index.php
 * Sujet         : le futur router?
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-04-20
 * Dernière mod. : 2025-05-15
 *
 * Description   : fichier par défaut qui s'affiche 
 */
use App\Controllers\Dashboard;
use App\Controllers\LoginController;
use App\Controllers\ListeProController;
use App\Core\Auth;

session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'autoload.php';
/**
 * initialisation variable de config
 */

 $setting = require_once __DIR__.'/config/setting.php';
 $GLOBALS['setting']=$setting;


/**
 *  le router maison
 */

if(@$_SESSION['login']) { //test si on est connecté

    $page = $_GET['page'] ?? 'dashboard';
    
    switch ($page) {
        
        case 'dashboard' :
            //require 'app/views/dashboard.php';
            //require 'app/Controllers/Dashboard.php';
            $page = new Dashboard();
            $page->loadDashboard();
            break;

        case 'login' :
            require 'app/Views/login.php';
            break;
        
        case 'listepro' :
            $page = new ListeProController();
            $page->listeMailpro();
            break;

        case 'formupdatepro' :
            $page = new ListeProController();
            $page->loadFormpro($_GET['id_pro']);
            break;

        case 'updatepro' :
            $page = new ListeProController();
            $page->updateMailpro($_POST['id_pro'],$_POST);
            break;

        case 'deletepro' : 
            $page = new ListeProController();
            $page->deleteMailpro($_GET['id_pro']);
            break;
        
        case 'createpro' :
            $page= new ListeProController();
            $page->loadFormAddpro();
            break;
        
        case 'addpro' :
            $page= new ListeProController();
            $page->addMailpro($_POST);
            break;
        
        case 'searchpro' :
            $page = new ListeProController();
            $page->searchMailpro($_REQUEST['rechercher']);
            break;
            
            
    
            


        case 'logout' :
            Auth::logout();
            break;

    
        /*default :
        require 'app/Views/dashboard.php';*/
    }
}

else { //sinon on test si form login evoyé ou on affiche 

    if(isset($_POST['login']) && isset($_POST['password'])) {
        $verification = new LoginController();
        $verification->handleLogin($_POST['login'],$_POST['password']);
    }
    else {
        require_once __DIR__ . '/app/Views/login.php';
    }
}