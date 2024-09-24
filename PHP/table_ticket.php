<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sncf_ticketing";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>

<?php
// Inclure le fichier de connexion à la base de données
require 'db.php';  

// Récupérer les tickets depuis la base de données
$query = "SELECT * FROM tickets";  // Requête SQL pour récupérer tous les tickets
$stmt = $pdo->prepare($query);     // Prépare la requête SQL
$stmt->execute();                  // Exécute la requête

$sql = "SELECT * FROM table_tickets";
$result = $conn->query($sql);

$tickets = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tickets[] = $row;
    }
}
$conn->close();


// Afficher les résultats dans une table HTML
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Tickets</title>
    <link rel="stylesheet" href="style.css"> <!-- Si vous avez un fichier CSS -->
</head>
<body>
    <h1>Gestion des Tickets</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Date de Création</th>
                <th>Date de Modification</th>
                <th>Utilisateur</th>
                <th>Catégorie</th>
                <th>Statut</th>
                <th>Priorité</th>
                <th>Date de Clôture</th>
                <th>Créé Par</th>
                <th>Commentaire de Résolution</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $ticket): ?>
                <tr>
                    <td><?php echo $ticket['id']; ?></td>
                    <td><?php echo $ticket['titre_ticket']; ?></td>
                    <td><?php echo $ticket['description_ticket']; ?></td>
                    <td><?php echo $ticket['date_creation_ticket']; ?></td>
                    <td><?php echo $ticket['date_modif_ticket']; ?></td>
                    <td><?php echo $ticket['utilisateur_id']; ?></td>
                    <td><?php echo $ticket['categorie_id']; ?></td>
                    <td><?php echo $ticket['statut_id']; ?></td>
                    <td><?php echo $ticket['priorite_id']; ?></td>
                    <td><?php echo $ticket['date_cloture']; ?></td>
                    <td><?php echo $ticket['cree_par']; ?></td>
                    <td><?php echo $ticket['commentaire_resolution']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $ticket['id']; ?>">Éditer</a>
                        <a href="copy.php?id=<?php echo $ticket['id']; ?>">Copier</a>
                        <a href="delete.php?id=<?php echo $ticket['id']; ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

