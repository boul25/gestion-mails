<?php

/**
 * Fichier       : formupdate.php
 * Sujet         : Formulaire pour modifier la table listepro
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-05-07
 * Dernière mod. : 2025-05-07
 *
 * Description   : Charger les données de la table en fonction de $_GET['id]
 */
include 'partials/header.php';
?>
<div class="container">
  <h1>Modifier une adresse professionnelle</h1>
  <form action="index.php?page=updatepro" method="post">
    <input type="hidden" name="id_pro" value="<?=$data['id_pro'];?>">

    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" value="<?=$data['nom']; ?>" >

    <label for="entreprise">Entreprise</label>
    <input type="text" id="entreprise" name="entreprise" value="<?= $data['entreprise']; ?>" >

    <label for="email">Adresse Email</label>
    <input type="email" id="email" name="email" value="<?= $data['email']; ?>" required>

    <label for="fonction">Fonction</label>
    <input type="text" id="fonction" value="<?= $data['fonction']; ?>" name="fonction">

    <label for="telephone">Téléphone</label>
    <input type="text" id="telephone" value="<?= $data['telephone']; ?>" name="telephone">

    <label for="id_secteur">Secteur</label>
    <select id="id_secteur" name="id_secteur">
      <option value="">-- Choisir un secteur --</option>
      <!-- Options PHP dynamiques ici -->
      <?php foreach ($secteur as $value) :   ?>
        <option value="<?= $value['id_secteur']; ?>" <?php if ($value['id_secteur'] == $data['id_secteur']) echo "selected"; ?>>
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