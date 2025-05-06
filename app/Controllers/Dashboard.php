<?php
/**
 * Fichier       : Dashboard.php
 * Sujet         : Dashboard controller
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-04-24
 * Dernière mod. : 2025-05-05
 *
 * Description   : C'est içi qu'on va mixer les nécessaire pour le dashboard de l' app
 */

namespace App\Controllers;

use App\Models\Emailpro;
use App\Models\Emailparticulier;


 class Dashboard {
    
    public int $nombreEmailpro ;

    public function loadDashboard() {

        
        $emailparticulier = new Emailparticulier();
        $nombreEmailparticulier=$emailparticulier->getNombre();
        $lastRecordparticulier=$emailparticulier->lastInsert();

        $emailpro = new Emailpro();
        $nombreEmailpro = $emailpro->getNombre();
        $lastRecordpro= $emailpro->lastInsert();
        include __DIR__ . '/../Views/dashboard.php';
    }
 }