<?php
$pdo = new PDO('mysql:host=localhost;dbname=films_db', 'username', 'password');

// Récupérer les films favoris
$favorites = $pdo->query("SELECT * FROM films WHERE is_favorite = 1")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Favoris</title>
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
                <a href="page_fav.php">Liste Favorite</a>
            </div>
        </header>
        
        <div id="main">
            <?php if ($favorites): ?>
                <?php foreach ($favorites as $film): ?>
                <div class="film">
                    <div class="image">
                        <img src="<?= htmlspecialchars($film['poster']) ?>" alt="<?= htmlspecialchars($film['title']) ?>">
                    </div>
                    <p><?= htmlspecialchars($film['title']) ?></p>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun film dans les favoris.</p>
            <?php endif; ?>
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
