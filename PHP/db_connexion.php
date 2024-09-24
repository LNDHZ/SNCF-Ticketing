<?php
// Informations de connexion à la base de données
$host = 'localhost';       // Hôte (généralement 'localhost')
$db   = 'sncf_ticketing';  // Nom de la base de données
$user = 'root';            // Nom d'utilisateur de MySQL
$pass = '';                // Mot de passe de MySQL
$charset = 'utf8mb4';      // Jeu de caractères

// DSN pour se connecter avec PDO
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    // Créer une nouvelle instance PDO
    $pdo = new PDO($dsn, $user, $pass); // Utilisation des variables correctes
    // Définir le mode d'erreur sur Exception pour faciliter le débogage
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à la base de données !";
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher un message
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
