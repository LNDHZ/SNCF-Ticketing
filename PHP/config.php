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

<?php
$host = 'localhost';        // Hôte
$db = 'sncf_ticketing';     // Nom de la base de données (assurez-vous qu'il existe)
$user = 'root';             // Nom d'utilisateur
$pass = '';                 // Mot de passe (vide si non défini)

try {
    // Créer une nouvelle instance PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    // Définir le mode d'erreur sur Exception pour faciliter le débogage
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à la base de données !";
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher un message
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>