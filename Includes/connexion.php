<!-- includes/connexion.php -->
<?php
// Paramètres de connexion
$servername = "localhost";
$username = "root";      
$password = "";           
$dbname = "sncf_ticketing"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}
?>
