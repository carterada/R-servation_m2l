<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservation_db";

$conn = new mysqli('localhost', 'root', '', 'reservation_db');

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}  else {
    echo "Connexion réussie !";
}
?>
