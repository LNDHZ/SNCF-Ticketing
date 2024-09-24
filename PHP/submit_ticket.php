<?php
// Inclure la configuration de la base de données
include 'includes/config.php';

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cp = $_POST['cp'];
    $role = $_POST['category'];
    $subject = $_POST['subject'];
    $category = $_POST['category'];
    $priority = $_POST['priority'];
    $description = $_POST['description'];

    // Préparer la requête SQL
    $sql = "INSERT INTO tickets (cp, role, subject, category, priority, description)
            VALUES ('$cp', '$role', '$subject', '$category', '$priority', '$description')";

    // Exécuter la requête
    if (mysqli_query($conn, $sql)) {
        echo "Le ticket a été créé avec succès.";
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
