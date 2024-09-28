<?php

$host = 'localhost'; 
$dbname = 'sncf_ticketing'; 
$username = 'root'; 
$password = '0000'; 

try {
   
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
  
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    

} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>

<?php
require 'includes/db_connexion.php'; 

echo "Connexion réussie à la base de données !"; 
?>
