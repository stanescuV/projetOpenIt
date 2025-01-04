<?php
$host = 'mysql';
$user = 'user';
$password = 'password';
$dbname = 'openit';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
       header("Location: index.php");
    } else {
        echo "Mot de passe incorrect.";
    }
} else {
    echo "Utilisateur non trouvé.";
}
?>
