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
        <section>
            <h2>Nombre d'adresse Professionnel : {nombre pro} </h2>
            <div id="FormPro">
                <form name="ajoutpro" id="ajoutpro" class="ajoutpro" action="index.php?page=ajoutpro" method="get">
                    <input type="submit" value="ajouter">
                </form>
            </div>
        </section>
        <section>
            <h2>Nombre d'adresse particulier : {nombre particulier} </h2>
            <div id="FormParticulier">
                <form name="ajoutparticulier" id="ajoutparticulier" class="ajoutparticulier" action="index.php?page=ajoutparticulier" method="get">
                    <input type="submit" value="ajouter">
                </form>
            </div>
        </section>
        <section>
            <h2> 5 derniers emails particulier insérés </h2>
            <p> {Nom} : {email} </p>
        </section>
        <section>
            <h2> 5 dernièrs email pro inséré </h2>
            <p> {Nom} ({entreprise}): {email} </p>
        </section>
<?php
include 'partials/footer.php';
?>