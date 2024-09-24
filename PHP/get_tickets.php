<?php
include 'db.php'; // Inclure le fichier de connexion

$sql = "SELECT * FROM table_ticket"; // Remplace 'tickets' par le nom de ta table
$result = $conn->query($sql);

$tickets = array();

if ($result->num_rows > 0) {
    // Récupérer les données de chaque ligne
    while($row = $result->fetch_assoc()) {
        $tickets[] = $row;
    }
} else {
    echo "0 résultats";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Tickets</title>
</head>
<body>
    <h1>Liste des Tickets</h1>
    <ul>
        <?php foreach ($tickets as $ticket): ?>
            <li><?php echo $ticket['id_ticket']; // Remplace 'titre' par le nom de la colonne que tu veux afficher ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
