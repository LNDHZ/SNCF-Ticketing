<?php
include 'connexion.php'; // Inclure le fichier de connexion

$sql = "SELECT * FROM table_ticket"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afficher les données de chaque ligne
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nom: " . $row["nom"]. "<br>"; // Remplacez par les colonnes de votre table
    }
} else {
    echo "0 résultats";
}

$conn->close(); // Fermer la connexion
?>
