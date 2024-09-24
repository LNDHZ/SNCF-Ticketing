<?php
$servername = "localhost";  // ou le serveur de ta base de données
$username = "root";
$password = "";
$dbname = "sncf_ticketing";

// Créer la connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}
?>
