<?php
include 'connexion.php';

$sql = "SELECT id, nom, email FROM utilisateurs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Nom: " . $row["nom"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 résultats";
}
$conn->close();
?>
