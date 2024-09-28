<?php
// Configuration de la base de données
$host = "localhost";  
$username = "root";   
$password = "0000";       
$database = "sncf_ticketing"; 

// Connexion à la base de données
$conn = new mysqli($host, $username, $password, $database);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}
?>
