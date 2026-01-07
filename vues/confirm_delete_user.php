<?php require 'vues/elements/entete.php'; ?>

<h1>Confirmation de suppression</h1>

<p>
Êtes-vous sûr de vouloir supprimer l’utilisateur : <?= $user['Pseudo_User'] ?> - (<?= $user['Mail'] ?>) ?
</p>

<form method="post" action="index.php?action=deleteUser&id=<?= $user['ID_User'] ?>">
    <button type="submit">Oui</button>
    <a href="index.php?action=admin"> Annuler </a>
</form>

</main>
</body>
</html>
