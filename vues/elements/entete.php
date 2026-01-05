<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="author" description="JM Gassiès">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Bon Coincoin</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    

<nav>
    <img src="images/logo.png" id="logo">
    <DIV class="acces">
    <a href="index.php" class="menu">Accueil</a>
    <a href="index.php?action=genre&type=Voiture" class="menu">Voiture</a>
    <a href="index.php?action=genre&type=Immobilier" class="menu">Immobilier</a>
    <a href="index.php?action=genre&type=Divers" class="menu">Divers</a>

    <?php if (isset($_SESSION['user'])): ?>
        <a href="index.php?action=addAnnonce" class="menu">Nouvelle annonce</a>
        <a href="index.php?action=logout" class="menu">Déconnexion</a>
    <?php else: ?>
        <a href="index.php?action=login" class="menu">Connexion</a>
    <?php endif; ?>

    <?php if (isset($_SESSION['user']) && $_SESSION['user']['Role'] === 'admin'): ?>
        <a href="index.php?action=admin">Admin</a>
    <?php endif; ?>
    </DIV>
</nav>
<hr>
<main>