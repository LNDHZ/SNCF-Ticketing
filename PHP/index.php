<?php
// Inclure le fichier de connexion
include 'connexion.php';

// Requête SQL pour vérifier la connexion
$query = $pdo->query("SELECT * FROM votre_table");
$results = $query->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($results); 
echo "</pre>";
?>
