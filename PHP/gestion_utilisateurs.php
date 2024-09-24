<?php
include 'connexion.php'; // Inclure le fichier de connexion

$sql = "SELECT id, nom, email FROM utilisateurs"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Liste des Utilisateurs</h1>
        <a href="create_user.php" class="btn btn-success mb-3">Créer un Utilisateur</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['nom_user']); ?></td>
                            <td><?php echo htmlspecialchars($row['prenom_user']); ?></td>
                            <td><?php echo htmlspecialchars($row['email_user']); ?></td>
                            <td><?php echo htmlspecialchars($row['mot_de_passe_user']); ?></td>
                            <td><?php echo htmlspecialchars($row['confirm_mdp']); ?></td>
                            <td><?php echo htmlspecialchars($row['role_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['Numéro_CP_Agent']); ?></td>
                            <td><?php echo htmlspecialchars($row['date_creation_compte']); ?></td>
                            <td><?php echo htmlspecialchars($row['statut_compte']); ?></td>
                            <td><?php echo htmlspecialchars($row['historique_activite']); ?></td>
                            <td><?php echo htmlspecialchars($row['Notifications']); ?></td>
                            <td>
                                <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Éditer</a>
                                <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Aucun utilisateur trouvé</td>
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
