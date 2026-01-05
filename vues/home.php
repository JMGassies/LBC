<?php require 'vues/elements/entete.php'; ?>

<h1>Annonces récentes</h1>

<?php foreach ($annonces as $a): ?>
<article>
    <h2><?= ($a['Titre']) ?></h2>
    <p><?= ($a['Description']) ?></p>
    <p><?= ($a['Prix']) ?> €</p>
    <p>Publié le <?= ($a['Date_Annonce']) ?></p>
    <p><?= ($a['Pseudo_User']) ?> - <?= ($a['Mail']) ?></p>

    <?php if ($a['Photo']): ?>
        <img src="uploads/<?= ($a['Photo']) ?>" width="200">
    <?php endif; ?>
</article>

<?php endforeach; ?>
</main>
</body>
</html>