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
?>
<div class="container">
    <h1>Modifier une adresse professionnelle</h1>
    <form action="index.php?page=updatepro" method="post">
      <input type="hidden" name="id_pro" value="">

      <label for="nom">Nom</label>
      <input type="text" id="nom" name="nom" required>

      <label for="entreprise">Entreprise</label>
      <input type="text" id="entreprise" name="entreprise" required>

      <label for="email">Adresse Email</label>
      <input type="email" id="email" name="email" required>

      <label for="fonction">Fonction</label>
      <input type="text" id="fonction" name="fonction">

      <label for="telephone">Téléphone</label>
      <input type="text" id="telephone" name="telephone">

      <label for="id_secteur">Secteur</label>
      <select id="id_secteur" name="id_secteur">
        <option value="">-- Choisir un secteur --</option>
        <!-- Options PHP dynamiques ici -->
      </select>

      <button type="submit">Enregistrer les modifications</button>
    </form>
  </div>