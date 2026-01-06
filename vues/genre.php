<?php require 'vues/elements/entete.php'; ?>

<h1>Annonces catégorie "<?= $_GET['type'] ?>"</h1>

<?php foreach ($annonces as $a): ?>
    <h2><?= $a['Titre'] ?></h2>
    <p><?= $a['Description'] ?></p>
    <p><?= $a['Prix'] ?> €</p>
    
    <p>Publié par <?= $a['Pseudo_User'] ?> le <?= $a['Date_Annonce'] ?></p>
<?php endforeach; ?>
</main>
</body>
</html>