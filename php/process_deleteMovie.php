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

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['deleteMovieId'])) {
    $movieId = $_POST['deleteMovieId'];

    $sql = "DELETE FROM movies WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $movieId);
    $stmt->execute();
    $stmt->close();
}

$conn->close();

header("Location: index.php");
exit();
