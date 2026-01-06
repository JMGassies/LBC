<?php require 'vues/elements/entete.php'; ?>

<h1>Annonces récentes</h1>

<?php foreach ($annonces as $a): ?>
<article>
    <h2><?= $a['Titre'] ?></h2>
    <p><?= $a['Description'] ?></p>
    <p><?= $a['Prix'] ?> €</p>
    <p>Publié par <?= $a['Pseudo_User'] ?>  le <?= $a['Date_Annonce'] ?></p>
    

    <?php if ($a['Photo']): ?>
        <img src="uploads/<?= ($a['Photo']) ?>" width="200">
    <?php endif; ?>
</article>

<?php endforeach; ?>
</main>
</body>
</html>