<?php
/**
 * Fichier       : liste_pro.php
 * Sujet         : view pour la liste des emails pros
 * Auteur        : Mamitiana Ramanandraitsiory <boul25@gmail.com>
 * Créé le       : 2025-05-02
 * Dernière mod. : 2025-05-07
 *
 * Description   : Affichage liste mail pro
 */
require 'partials/header.php';
?>
<?php if (isset($_GET['success'])): ?>
  <div class="alert alert-success">
    ✅ Modifications enregistrées avec succès !
  </div>
<?php endif; ?>

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
    <?php foreach ($liste as $pro): ?>
    <tr>
      <td><?= $pro['id_pro']; ?></td>
      <td><?= htmlspecialchars($pro['nom'] ?? '') ?></td>
      <td><?= htmlspecialchars($pro['entreprise']?? '') ?></td>
      <td><?= htmlspecialchars($pro['email']?? '') ?></td>
      <td>
        <a href="index.php?page=formupdatepro&id_pro=<?=$pro['id_pro'];?>">✏️</a>
        <a href="index.php?page=deletepro&id_pro=<?=$pro['id_pro'];?>" onclick="return confirm('Supprimer ?')">🗑️</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php
$nbPages = ceil($total / 100);
$pageActive = $_GET['pagination'] ?? 0;

echo "<nav class='pagination'><ul>";
for ($i = 0; $i < $nbPages; $i++) {
    if ($i == $pageActive) {
        echo "<li><span class='active'>Page " . ($i + 1) . "</span></li>";
    } else {
        echo "<li><a href=\"index.php?page=listepro&pagination=$i\">Page " . ($i + 1) . "</a></li>";
    }
}
echo "</ul></nav>";


    require 'partials/footer.php';
?>