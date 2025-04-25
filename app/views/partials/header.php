<?php

/**
 * Fichier       : header.php
 * Sujet         : le  header de l' application
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-04-24
 * Dernière mod. : 2025-04-24
 *
 * Description   : Juste une partie de l'header
 */
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/gestion-mails/public/css/dashboard.css">
</head>

<body>
    <header>
        <div id="connecter">Utilisateur connecté : <?=$_SESSION['login'];?> <br> <a href="index.php?page=logout">Se deconnecter</a></div>
        <nav>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Gestion Utilisateur</a></li>
                <li><a href="#">Gestion Secteur</a></li>
                <li><a href="#">Gestion Professionnel</a></li>
                <li><a href="#">Gestion Particulier</a></li>

            </ul>
        </nav>
    </header>
    <main>