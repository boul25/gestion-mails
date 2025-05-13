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
$old = $_SESSION['old_inputs'] ?? [];
unset($_SESSION['old_inputs']);
?>
<?php if (isset($_SESSION['error'])): ?>
  <div class="alert alert-danger">
     <?= htmlspecialchars($_SESSION['error']) ?>
  </div>
  <?php unset($_SESSION['error']); ?>
<?php endif; ?>
<div class="container">
  <h1>Ajouter une adresse professionnelle</h1>
  <form action="index.php?page=addpro" method="post">
    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($old['nom'] ?? '') ?>">

    <label for="entreprise">Entreprise</label>
    <input type="text" id="entreprise" name="entreprise" value="<?= htmlspecialchars($old['entreprise'] ?? '') ?>">

    <label for="email">Adresse Email</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>" required>

    <label for="fonction">Fonction</label>
    <input type="text" id="fonction" name="fonction" value="<?= htmlspecialchars($old['fonction'] ?? '') ?>">

    <label for="telephone">Téléphone</label>
    <input type="text" id="telephone" name="telephone" value="<?= htmlspecialchars($old['telephone'] ?? '') ?>">

    <label for="id_secteur">Secteur</label>
    <select id="id_secteur" name="id_secteur" required>
        <option value="">-- Choisir un secteur --</option>
        <?php foreach ($secteur as $value): ?>
            <option value="<?= $value['id_secteur']; ?>"
                <?= isset($old['id_secteur']) && $old['id_secteur'] == $value['id_secteur'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($value['libelle_secteur']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Enregistrer les modifications</button>
  </form>
</div>
<?php
include 'partials/footer.php';
?>