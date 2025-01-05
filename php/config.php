<?php
// Start the session at the very beginning
session_start();

$host = 'mysql';
$user = 'user';
$password = 'password';
$dbname = 'openit';

// Create the connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>