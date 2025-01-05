<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['movieInput']) && !empty(trim($_POST['movieInput']))) {
        $movieName = trim($_POST['movieInput']);
        $userId = $_SESSION['user_id'];
        $favorite = 0;

        $sql = "INSERT INTO movies (user_id, title, favorie) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isi", $userId, $movieName, $favorite);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Failed to insert movie.";
        }

        $stmt->close();
    } else {
        echo "Invalid movie name.";
    }
}
?>