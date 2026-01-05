<?php require 'vues/elements/entete.php'; ?>

<h1>Annonces <?= ($_GET['type']) ?></h1>

<?php foreach ($annonces as $a): ?>
    <h2><?= ($a['Titre']) ?></h2>
    <p><?= ($a['Description']) ?></p>
    <p><?= ($a['Prix']) ?> €</p>
    <p><?= ($a['Pseudo_User']) ?></p>
    <p>Publié le <?= ($a['Date_Annonce']) ?></p>
<?php endforeach; ?>
</main>
</body>
</html>