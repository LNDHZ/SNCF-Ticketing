<?php
$servername = "localhost";  
$username = "root";        
$password = "0000";         
$dbname = "sncf_ticketing";  

// Créer la connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// Si la connexion est réussie
echo "Connexion réussie à la base de données !";
?>
