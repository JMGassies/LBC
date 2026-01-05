<?php require 'vues/elements/entete.php'; ?>

<h2>Nouvelle annonce</h2>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="titre" required>
    <textarea name="description" required></textarea>
    <input type="number" name="prix" required>
    <select name="genre">
        <option>Voiture</option>
        <option>Immobilier</option>
        <option>Divers</option>
    </select>
    <input type="file" name="photo">
    <button>Publier</button>
</form>
</main>
</body>
</html>