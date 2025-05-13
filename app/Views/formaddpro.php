<?php

/**
 * Fichier       : formupdate.php
 * Sujet         : Formulaire pour modifier la table listepro
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-05-15
 * Dernière mod. : 2025-05-15
 *
 * Description   : Charger les données de la table en fonction de $_GET['id]
 */
include 'partials/header.php';
?>
<div class="container">
  <h1>Ajouter une adresse professionnelle</h1>
  <form action="index.php?page=addpro" method="post">
    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" value="" >

    <label for="entreprise">Entreprise</label>
    <input type="text" id="entreprise" name="entreprise" value="" >

    <label for="email">Adresse Email</label>
    <input type="email" id="email" name="email" value="" required>

    <label for="fonction">Fonction</label>
    <input type="text" id="fonction" value="" name="fonction">

    <label for="telephone">Téléphone</label>
    <input type="text" id="telephone" value="" name="telephone">
    <label for="id_secteur">Secteur</label>
    <select id="id_secteur" name="id_secteur">
      <option value="">-- Choisir un secteur --</option>
      <!-- Options PHP dynamiques ici -->
       
      <?php foreach ($secteur as $value) :   ?>
        <option value="<?= $value['id_secteur']; ?>">
          <?= $value['libelle_secteur']; ?>
        </option>
      <?php endforeach; ?>
    </select>

    <button type="submit">Enregistrer les modifications</button>
  </form>
</div>
<?php
include 'partials/footer.php';
?>