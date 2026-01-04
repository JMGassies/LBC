<?php require 'vues/elements/entete.php'; ?>

<h1>Annonces <?= htmlspecialchars($_GET['type']) ?></h1>

<?php foreach ($annonces as $a): ?>
    <h3><?= htmlspecialchars($a['Titre']) ?></h3>
    <p><?= htmlspecialchars($a['Description']) ?></p>
    <p><?= htmlspecialchars($a['Prix']) ?> €</p>
    <p><?= htmlspecialchars($a['Pseudo_User']) ?></p>
    <p>Publié le <?= htmlspecialchars($a['Date_Annonce']) ?></p>
<?php endforeach; ?>