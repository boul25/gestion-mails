<?php

/**
 * Fichier       : searchbar.php
 * Sujet         : barre de recherche
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-05-15
 * Dernière mod. : 2025-05-17
 *
 * Description   : html barre de recherche + bouton ajout mail
 */
?>
<div class="headercontainer">
    <div class="searchbar">
        <form class="search-form" method="post" action="index.php?page=searchpro">
            <input type="text" name="rechercher" <?php if (isset($searchmot)) :  ?> value="<?=$searchmot;?>" <?php endif; ?> placeholder="Rechercher..." required>
            <button type="submit" class="search-icon"></button>
        </form>

    </div>
    <div class="add">
        <a href="index.php?page=createpro" class="btn btn-add">
            ➕ Ajouter un nouveau mail
        </a>
    </div>
</div>