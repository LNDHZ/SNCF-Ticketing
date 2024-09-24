<?php
include 'db_connexion.php';

$nom = $_POST['nom'];
$email = $_POST['email'];

// Validation des données
if (empty($nom) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Nom ou email invalide.";
    exit;
}

// Préparation de la requête
$stmt = $conn->prepare("INSERT INTO utilisateurs (nom, email) VALUES (?, ?)");
$stmt->bind_param("ss", $nom, $email);

if ($stmt->execute()) {
    echo "Nouveau record créé avec succès";
} else {
    echo "Erreur : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
