<?php
include('connexion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
 
    $sql = "DELETE FROM utilisateurs WHERE id = $id";
    
    if (mysqli_query($conn, $sql)) {
        echo "L'utilisateur a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'utilisateur.";
    }

    header("Location: liste_utilisateurs.php"); 
    exit;
}
?>
