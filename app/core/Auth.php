<?php
/**
 * Fichier       : Auth.php
 * Sujet         : Fichier pour verifier si on est authentifier et la sécru
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-04-24
 * Dernière mod. : 2025-04-24
 *
 * Description   : verifie si la variable session existe, fonction qui test la session, fonction qui supprime la sesstion
 * 
 */

 class Auth {

    /**
     * fonction qui controle la presence de la session
     *
     * @return boolean
     */
    public static function check(): bool {
        return isset($_SESSION['login']);

    }

    public static function requireLogin() : void {
        if(!self::check()) {
            header('Location: index.php?page=login');
            exit;
        }
    }

    public static function logout() : void {
        session_destroy();
        header('Location: index.php?page=login');
        exit;

    }
 }