<?php
// Inclure la configuration de la base de données
include 'includes/config.php';

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['subject']; 
    $description = $_POST['description']; 
    $utilisateur_id = $_POST['user_id']; 
    $categorie = $_POST['category']; 
    $statut = 'ouvert'; 
    $priorite = $_POST['priority']; 
    $cree_par = $_POST['created_by']; 
    $commentaire_resolution = ''; 
    $action_ticket = ''; 

    // Préparer la requête SQL
    $sql = "INSERT INTO table_tickets (titre_ticket, description_ticket, date_creation_ticket, utilisateur_id, categorie_id, statut_id, priorite_id, cree_par, commentaire_resolution, Action_ticket)
            VALUES ('$titre', '$description', NOW(), '$utilisateur_id', '$categorie', '$statut', '$priorite', '$cree_par', '$commentaire_resolution', '$action_ticket')";

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
