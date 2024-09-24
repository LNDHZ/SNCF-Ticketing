<?php
include 'connexion.php';

$nom = $_POST['nom'];
$email = $_POST['email'];

$sql = "INSERT INTO utilisateurs (nom, email) VALUES ('$nom', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Nouveau record créé avec succès";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
