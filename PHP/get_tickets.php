<?php
include 'db.php'; 

$sql = "SELECT * FROM table_ticket"; 
$result = $conn->query($sql);

$tickets = array();

if ($result->num_rows > 0) {
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Liste des Tickets</h1>
        <a href="create_ticket.php" class="btn btn-primary mb-3">Ajouter un Ticket</a>
        
        <ul class="list-group">
            <?php if (count($tickets) > 0): ?>
                <?php foreach ($tickets as $ticket): ?>
                    <li class="list-group-item">
                        <h5><?php echo htmlspecialchars($ticket['titre_ticket']); ?></h5>
                        <p><strong>ID:</strong> <?php echo htmlspecialchars($ticket['id']); ?></p>
                        <p><strong>Description:</strong> <?php echo htmlspecialchars($ticket['description_ticket']); ?></p>
                        <p><strong>Date de Création:</strong> <?php echo htmlspecialchars($ticket['date_creation_ticket']); ?></p>
                        <p><strong>Date de Modification:</strong> <?php echo htmlspecialchars($ticket['date_modif_ticket']); ?></p>
                        <p><strong>Utilisateur ID:</strong> <?php echo htmlspecialchars($ticket['utilisateur_id']); ?></p>
                        <p><strong>Catégorie ID:</strong> <?php echo htmlspecialchars($ticket['categorie_id']); ?></p>
                        <p><strong>Statut ID:</strong> <?php echo htmlspecialchars($ticket['statut_id']); ?></p>
                        <p><strong>Priorité ID:</strong> <?php echo htmlspecialchars($ticket['priorite_id']); ?></p>
                        <p><strong>Date de Clôture:</strong> <?php echo htmlspecialchars($ticket['date_cloture']); ?></p>
                        <p><strong>Créé par:</strong> <?php echo htmlspecialchars($ticket['cree_par']); ?></p>
                        <p><strong>Commentaire de Résolution:</strong> <?php echo htmlspecialchars($ticket['commentaire_resolution']); ?></p>
                        <p><strong>Action:</strong> <?php echo htmlspecialchars($ticket['Action_ticket']); ?></p>
                        <div>
                            <a href="edit_ticket.php?id=<?php echo $ticket['id']; ?>" class="btn btn-warning">Éditer</a>
                            <a href="delete_ticket.php?id=<?php echo $ticket['id']; ?>" class="btn btn-danger">Supprimer</a>
                        </div>
                    </li>
                    <hr> <!-- Sépare visuellement les tickets -->
                <?php endforeach; ?>
            <?php else: ?>
                <li class="list-group-item">Aucun ticket n'a été trouvé.</li>
            <?php endif; ?>
        </ul>
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
