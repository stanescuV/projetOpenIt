<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost:8080;dbname=openit', 'user', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Pour voir les erreurs en cas de problème

// Gestion de l'ajout/enlèvement des films aux favoris
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toggle_favorite'])) {
    // Récupérer l'ID du film et son état actuel des favoris
    $filmId = (int)$_POST['film_id'];
    $isFavorite = (int)$_POST['is_favorite'];
    
    // Mettre à jour l'état des favoris (bascule entre 0 et 1)
    $stmt = $pdo->prepare("UPDATE films SET is_favorite = :is_favorite WHERE id = :id");
    $stmt->execute(['is_favorite' => !$isFavorite, 'id' => $filmId]);

    // Rediriger pour éviter la soumission multiple du formulaire
    header('Location: index.php');
    exit;
}

// Récupérer tous les films depuis la base de données
$films = $pdo->query("SELECT * FROM films")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Liste des Films</title>
</head>
<body>
    <div id="container">
        <header>
            <div id="image_openit_blue">
                <img src="images/openit_blue.png" alt="OpenIt Blue">
            </div>
            <div class="nav-links">
                <a href="index.php">Acceuil</a>
                <a href="index.php">Liste Films</a>
                <a href="page_fav.php">Liste Favoris</a>
            </div>
            <?php if ($is_logged_in): ?>
            <div class="logout-button">
                <form method="POST" action="deconnexion.php">
                    <button type="submit" name="logout">Se Déconnecter</button>
                </form>
            </div>
        <?php else: ?>
            <div class="login-link">
                <a href="connexion.php">Se connecter</a>
            </div>
        <?php endif; ?>
        </header>
        
        <div id="main">
            <?php foreach ($films as $film): ?>
            <div class="film">
                <div class="image">
                    <img src="<?= htmlspecialchars($film['poster']) ?>" alt="<?= htmlspecialchars($film['title']) ?>">
                </div>
                <p><?= htmlspecialchars($film['title']) ?></p>
                <!-- Formulaire pour ajouter/enlever des favoris -->
                <form method="POST" action="index.php">
                    <input type="hidden" name="film_id" value="<?= $film['id'] ?>">
                    <input type="hidden" name="is_favorite" value="<?= $film['is_favorite'] ?>">
                    <button type="submit" name="toggle_favorite">
                        <?= $film['is_favorite'] ? 'Enlever des Favoris' : 'Ajouter aux Favoris' ?>
                    </button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
        
        <footer>
            <div id="image_openit_blue">
                <img src="images/openit.png" alt="OpenIt image" width="100px" height="100px">
            </div>
            <div class="footerLinks">
                <a href="index.php">Acceuil</a>
                <a href="index.php">Mention Légales</a>
                <a href="index.php">Contact</a>
            </div>
        </footer>
    </div>
</body>
</html>
