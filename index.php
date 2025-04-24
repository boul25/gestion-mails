<?php
/**
 * Fichier       : index.php
 * Sujet         : le futur router?
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-04-20
 * Dernière mod. : 2025-04-24
 *
 * Description   : fichier par défaut qui s'affiche 
 */
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

/**
 * initialisation variable de config
 */

 $setting = require_once __DIR__.'/config/setting.php';
 $GLOBALS['setting']=$setting;

 /**
  * configuration autoload
  */

  spl_autoload_register(function ($className) {
    $paths = ['core', 'models', 'controllers'];
    foreach ($paths as $path) {
        $file = __DIR__ . '/app/' . $path . '/' . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});


/**
 *  le router maison
 */

if(@$_SESSION['login']) { //test si on est connecté

    $page = $_GET['page'] ?? 'dashboard';
    
    switch ($page) {
        
        case 'dashboard' :
            //require 'app/views/dashboard.php';
            require 'app/controllers/Dashboard.php';
            $page = new Dashboard();
            $page->loadDashboard();
            break;

        case 'login' :
            require 'app/views/index.php';
            break;

        case 'logout' :
            Auth::logout();
            break;

    
        /*default :
        require 'app/views/dashboard.php';*/
    }
}

else { //sinon on test si form login evoyé ou on affiche 

    if(isset($_POST['login']) && isset($_POST['password'])) {
        $verification = new LoginController();
        $verification->handleLogin($_POST['login'],$_POST['password']);
    }
    else {
        require_once __DIR__ . '/app/views/login.php';
    }
}