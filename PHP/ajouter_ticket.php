<?php
include 'connexion.php'; // Inclure le fichier de connexion

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $cree_par = $_POST['cree_par'];
    $statut = $_POST['statut'];
    $priorite = $_POST['priorite'];
    $categorie = $_POST['categorie'];
    $commentaire_resolution = $_POST['commentaire_resolution'];

    // Préparer la requête d'insertion
    $sql = "INSERT INTO tickets (titre, cree_par, statut, priorite, categorie, commentaire_resolution)
            VALUES ('$titre', $cree_par, '$statut', '$priorite', '$categorie', '$commentaire_resolution')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouveau ticket ajouté avec succès !";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    $conn->close(); // Fermer la connexion
}
?>
