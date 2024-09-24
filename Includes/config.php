<?php
$host = 'localhost'; // ou l'adresse de ton serveur
$dbname = 'sncf_ticketing'; // nom de ta base de données
$username = 'root'; // nom d'utilisateur pour la base de données
$password = ''; // mot de passe pour la base de données

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
