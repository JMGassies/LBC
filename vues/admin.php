<?php require 'vues/elements/entete.php'; ?>

<h1>Administration</h1>
    <table>
        <tr>
            <td>Pseudo Utilisateur</td>
            <td>Nombre d'annonces</td>
            <td>Action</td>
        </tr>

<?php foreach ($users as $u): ?>
        <tr>
            <td><?= $u['Pseudo_User'] ?> (<?= $u['Mail'] ?>)</td>
            <td><?= (int)$u['nb_annonces'] ?></td>
            <td><a href="index.php?action=confirmDeleteUser&id=<?= $u['ID_User'] ?>">Supprimer</a></td>

        </tr>
<?php endforeach; ?>



    </table>


<!-- 
<?php foreach ($users as $u): ?>
    <p>
        <?= $u['Pseudo_User'] ?> (<?= $u['Mail'] ?>) nb d'annonce(s): <?= (int)$u['nb_annonces'] ?>
        <a href="index.php?action=deleteUser&id=<?= $u['ID_User'] ?>">Supprimer</a>
    </p>
<?php endforeach; ?> -->

</main>
</body>
</html>