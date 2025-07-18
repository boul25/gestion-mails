<?php

/**
 * Fichier       : serp_pro.php
 * Sujet         : Search result page
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-06-02
 * Dernière mod. : 2025-06-02
 *
 * Description   : On liste içi le resultat des recherces
 */
require 'partials/header.php';
?>
<?php if (isset($_GET['success'])): ?>
  <!-- message alert apres soumissions -->
  <div class="alert alert-success">
    ✅ Modifications enregistrées avec succès !
  </div>
<?php endif; ?>
<!-- header 2 -->
 <?php
  require __DIR__.'/partials/searchbar.php';
 ?>



<table class="table-emails">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Entreprise</th>
      <th>Email</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $i=1;
        foreach ($result as $pro): 
    ?>
      <tr>
        <td><strong><?=$i;?> - </strong><?= $pro['id_pro']; ?></td>
        <td><?= htmlspecialchars($pro['nom'] ?? '') ?></td>
        <td><?= htmlspecialchars($pro['entreprise'] ?? '') ?></td>
        <td><?= htmlspecialchars($pro['email'] ?? '') ?></td>
        <td>
          <a href="index.php?page=formupdatepro&id_pro=<?= $pro['id_pro']; ?>">✏️</a>
          <a href="index.php?page=deletepro&id_pro=<?= $pro['id_pro']; ?>" onclick="return confirm('Supprimer ?')">🗑️</a>
        </td>
      </tr>
    <?php $i++; endforeach; ?>
  </tbody>
</table>
<?php
$nbPages = ceil($total_search / 30);
$pageActive = isset($_GET['pagination']) ? (int) $_GET['pagination'] : 0;

$start = max(0, $pageActive - 2);
$end = min($nbPages - 1, $pageActive + 2);

echo "<nav class='pagination'><ul>";

// 🔹 Bouton "Début"
if ($pageActive > 2) {
  echo "<li><a href=\"index.php?page=searchpro&pagination=0&rechercher=$searchmot\">« Début</a></li>";
}

// 🔹 Bouton "Précédent"
if ($pageActive > 0) {
  $prev = $pageActive - 1;
  echo "<li><a href=\"index.php?page=searchpro&pagination=$prev&rechercher=$searchmot\">← Précédent</a></li>";
}

// 🔸 Pages autour de la page active
for ($i = $start; $i <= $end; $i++) {
  if ($i == $pageActive) {
    echo "<li><span class='active'>" . ($i + 1) . "</span></li>";
  } else {
    echo "<li><a href=\"index.php?page=searchpro&pagination=$i&rechercher=$searchmot\">" . ($i + 1) . "</a></li>";
  }
}

// 🔹 Bouton "Suivant"
if ($pageActive < $nbPages - 1) {
  $next = $pageActive + 1;
  echo "<li><a href=\"index.php?page=searchpro&pagination=$next&rechercher=$searchmot\">Suivant →</a></li>";
}

// 🔹 Bouton "Fin"
if ($pageActive < $nbPages - 3) {
  $last = $nbPages - 1;
  echo "<li><a href=\"index.php?page=searchpro&pagination=$last&rechercher=$searchmot\">Fin »</a></li>";
}

echo "</ul></nav>";

// ℹ️ Affichage du résumé
$debut = $pageActive * 30 + 1;
$fin = min(($pageActive + 1) * 30, $total_search);
echo "<div class='pagination-info'>";
echo "Affichage des enregistrements $debut à $fin sur $total_search (Page " . ($pageActive + 1) . " sur $nbPages)";
echo "</div>";
?>


<?php
require 'partials/footer.php';
?>