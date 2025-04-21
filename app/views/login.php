<?php

/**
 * Fichier       : login.php
 * Sujet         : Fichier html pour affichier le formulaire
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-04-20
 * Dernière mod. : 2025-04-20
 *
 * Description   : Décrivez ce que fait ce fichier ici...
 */
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" href="/gestion-mails/public/css/style.css">
</head>

<body>
    <main id="container"  class="container">
            <?php
                if(isset($_SESSION['error_message'])) {
            ?>
            <div id="error" class="error"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']);?></div>
            <?php
                }
            ?>
            <div id="titre" class="titre">Page d'Authentification</div>
            <div id="formulaire" class="formulaire">
                <form name="loginForm" id="loginForm" action="" method="post">
                    <label for="login"> Login </label>
                    <input type="text" id="login" name="login">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                    <input type="submit" value="se connecter">
                </form>
            </div>
    </main>
</body>

</html>