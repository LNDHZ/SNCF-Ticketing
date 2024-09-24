<?php
// Connexion à la base de données
include('connexion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Requête pour supprimer l'utilisateur
    $sql = "DELETE FROM utilisateurs WHERE id = $id";
    
    if (mysqli_query($conn, $sql)) {
        echo "L'utilisateur a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'utilisateur.";
    }
    
    // Redirection ou message de confirmation
    header("Location: liste_utilisateurs.php"); // Redirection vers la liste des utilisateurs
    exit;
}
?>
