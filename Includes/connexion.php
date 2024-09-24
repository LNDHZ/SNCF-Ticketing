<!-- includes/connexion.php -->
<?php
// Paramètres de connexion
$servername = "localhost";
$username = "root";       // Utilisateur de la base de données
$password = "";           // Mot de passe de l'utilisateur
$dbname = "sncf_ticketing"; // Nom de la base de données

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}
?>
