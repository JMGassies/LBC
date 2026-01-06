<?php require 'vues/elements/entete.php'; ?>

<h1>Nouvelle annonce</h1>
<br>

<form method="post" enctype="multipart/form-data">
    <label>Titre de l'annonce</label>
    <input type="text" name="titre" size="50" required><br><br>
    <label>Texte de l'annonce</label> <br>
    <textarea name="description" rows="5" cols="66" required></textarea><br><br>
    <label>Prix</label>
    <input type="number" name="prix" required>
    <label>Dans quelle catégorie classer l'annonce</label>
    <select name="genre">
        <option>Voiture</option>
        <option>Immobilier</option>
        <option>Divers</option>
    </select><br><br>
    <label>Image</label>
    <input type="file" name="photo">
    <button>Publier</button>
</form>
</main>
</body>
</html>