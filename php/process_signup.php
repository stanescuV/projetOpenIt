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
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);


$sql = "SELECT * FROM user WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Cet email est déjà enregistré.";
} else {
    
    $sql = "INSERT INTO user (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();

    
    header("Location: connexion.php");
}
?>
