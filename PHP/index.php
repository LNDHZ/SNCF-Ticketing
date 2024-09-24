<?php
include 'connexion.php'; // Inclure le fichier de connexion

$sql = "SELECT * FROM table_ticket"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Tickets</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Liste des Tickets</h1>
        <a href="create_ticket.php" class="btn btn-success mb-3">Créer un Ticket</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Date de Création</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['titre_ticket']); ?></td>
                            <td><?php echo htmlspecialchars($row['description_ticket']); ?></td>
                            <td><?php echo htmlspecialchars($row['date_creation_ticket']); ?></td>
                            <td><?php echo htmlspecialchars($row['statut_id']); ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Éditer</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Aucun ticket trouvé</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <footer class="footer text-center mt-5">
        <div class="container">
            <h3>
                SNCF Ticketing |
                <a href="/version.html" class="footer-link">Version 1.1</a> |
                <a href="/HTML/cgu.html" class="footer-link">CGU</a> |
                <a href="/HTML/mentions.html" class="footer-link">Mentions légales</a> |
                <a href="/HTML/page_contacts.html" class="footer-link">Contactez-nous</a> |
                e-SNCF ©2024
            </h3>
        </div>
    </footer>
</body>
</html>

<?php
$conn->close(); // Fermer la connexion
?>
