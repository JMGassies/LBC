<?php require 'vues/elements/entete.php'; ?>

<h1>Administration</h1>

<?php foreach ($users as $u): ?>
    <p>
        <?= htmlspecialchars($u['Pseudo_User']) ?> (<?= htmlspecialchars($u['Mail']) ?>)
        <a href="index.php?action=deleteUser&id=<?= $u['ID_User'] ?>">Supprimer</a>
    </p>
<?php endforeach; ?>