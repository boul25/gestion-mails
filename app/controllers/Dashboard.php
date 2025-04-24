<?php
/**
 * Fichier       : Dashboard.php
 * Sujet         : Dashboard controller
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-04-24
 * Dernière mod. : 2025-04-24
 *
 * Description   : C'est içi qu'on va mixer les nécessaire pour le dashboard de l' app
 */

 class Dashboard {

    public function loadDashboard() {
        include __DIR__ . '/../views/dashboard.php';
    }
 }