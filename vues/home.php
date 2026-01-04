<?php require 'vues/elements/entete.php'; ?>

<h1>Annonces récentes</h1>

<?php foreach ($annonces as $a): ?>
<article>
    <h2><?= htmlspecialchars($a['Titre']) ?></h2>
    <p><?= htmlspecialchars($a['Description']) ?></p>
    <p><?= htmlspecialchars($a['Prix']) ?> €</p>
    <p>Publié le <?= htmlspecialchars($a['Date_Annonce']) ?></p>
    <p><?= htmlspecialchars($a['Pseudo_User']) ?> - <?= htmlspecialchars($a['Mail']) ?></p>

    <?php if ($a['Photo']): ?>
        <img src="uploads/<?= htmlspecialchars($a['Photo']) ?>" width="200">
    <?php endif; ?>
</article>
<hr>
<?php endforeach; ?>