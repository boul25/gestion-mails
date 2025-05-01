<?php

/**
 * Fichier       : dashboard.php
 * Sujet         : view du dashbord
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-04-20
 * Dernière mod. : 2025-04-24
 *
 * Description   : Le Html du dashboard
 */
include 'partials/header.php';
?>
<div id="stat">
    <section id="nbrepro">
        <h2>Nombre d'adresse Professionnel : <?= $nombreEmailpro; ?></h2>
        <div id="FormPro">
            <form name="ajoutpro" id="ajoutpro" class="ajoutpro" action="index.php?page=ajoutpro" method="get">
                <input type="submit" value="ajouter">
            </form>
        </div>
    </section>
    <section id="nbreparticulier">
        <h2>Nombre d'adresse particulier : <?=$nombreEmailparticulier;?> </h2>
        <div id="FormParticulier">
            <form name="ajoutparticulier" id="ajoutparticulier" class="ajoutparticulier" action="index.php?page=ajoutparticulier" method="get">
                <input type="submit" value="ajouter">
            </form>
        </div>
    </section>
</div>
<div id="lastrecord">
    <section id="lastpro">
        <h2> 5 dernièrs email pro inséré </h2>
        <?php 
        $j=1;
        foreach ($lastRecordpro as $pro) :
        ?>
        <p> <?= $j ." - ". $pro['nom']." ". $pro['entreprise']." : ".$pro['email'];?> </p>
        <?php $j++;
        endforeach
        ?>
    </section>
    <section id="lastparticuler">
        <h2> 5 derniers emails particulier insérés </h2>
        <?php
        $i=1;
        foreach ($lastRecordparticulier as $part) :
        ?>     
        <p> <?= $i."-".$part['nom']." : ".$part['email']; $i++;?> </p>
        <?php
        endforeach
        ?>
    </section>
</div>
<?php
include 'partials/footer.php';
?>