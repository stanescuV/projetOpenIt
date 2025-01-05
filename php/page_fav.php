<?php
session_start();

$host = 'mysql';
$user = 'user';
$password = 'password';
$dbname = 'openit';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Fetch only favorite movies for the current user
$userId = $_SESSION['user_id']; // Assuming the user is logged in
$sql = "SELECT * FROM movies WHERE user_id = ? AND favorie = 1"; // Only fetch favorite movies
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$movies = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();

$conn->close();

// Handling favorite toggling through the form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['movieId']) && isset($_POST['favorite'])) {
    $movieId = $_POST['movieId'];
    $favorite = $_POST['favorite'];

    // Update the favorite status in the database
    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
    }
    $sql = "UPDATE movies SET favorie = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $favorite, $movieId);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // Redirect to the same page to refresh the button state
    header("Location: page_fav.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Liste des Films Favoris</title>
</head>

<body>
    <div id="container">
        <!-- Header -->
        <header>
            <div id="image_openit_blue">
                <img src="images/openit_blue.png" alt="OpenIt Blue">
            </div>
            <div class="nav-links">
                <a href="index.php">Acceuil</a>
                <a href="index.php">Liste Films</a>
                <a href="page_fav.php">Liste Favorite</a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Rechercher">
                <button type="submit">Search</button>
            </div>
            <div class="settings">
                <img src="images/settings.png" alt="Settings">
            </div>
        </header>

        <div id="main">
            <!-- Movies Container -->
            <div id="moviesContainer">
                <?php if (empty($movies)): ?>
                    <p>No favorite movies yet.</p>
                <?php else: ?>
                    <?php foreach ($movies as $movie): ?>
                        <div class="film" id="movie-<?php echo $movie['id']; ?>">
                            <div class="image">
                                <img src="images/film.jpg" alt="Film">
                            </div>
                            <p>Film: <?php echo htmlspecialchars($movie['title']); ?></p>

                            <!-- Favorite Button (No Need to Update the DB Here) -->
                            <form method="POST">
                                <input type="hidden" name="movieId" value="<?php echo $movie['id']; ?>">
                                <input type="hidden" name="favorite" value="0"> <!-- Set to 0 to remove from favorites -->
                                <button type="submit" class="favorite-button">
                                    Remove from Favorites
                                </button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <div id="image_openit_blue">
                <img src="images/openit.png" alt="OpenIt image" width="100px" height="100px">
            </div>
            <div class='footerLinks'>
                <a href="index.php">Acceuil</a>
                <a href="index.php">Mention Légales</a>
                <a href="index.php">Contact</a>
            </div>
        </footer>
    </div>
</body>

</html>