<?php
/**
 * Fichier       : autoload.php
 * Sujet         : Sujet du fichier
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-05-01
 * Dernière mod. : 2025-05-01
 *
 * Description   : Décrivez ce que fait ce fichier ici...
 */
/**
 * configuration autoload
 */

spl_autoload_register(function ($className) {
   $className = str_replace('App\\','',$className);
   $className= str_replace('\\','/',$className);
        $file = __DIR__ . '/app/'  . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    
});