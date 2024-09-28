<?php
include 'connexion.php'; 

$sql = "SELECT id, nom_user, prenom_user, email_user, mot_de_passe_user, confirm_mdp, role_id, Numéro_CP_Agent, date_creation_compte, statut_compte, historique_activite, Notifications FROM table_utilisateur"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">

<!--HEAD-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNCF TICKETING</title>
    <link rel="stylesheet" href="/CSS/gestion_utilisateurs.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        function showAlert() {
            alert("Bienvenue sur votre page de gestion des utilisateurs, SNCF Ticketing!");
        }
       
        window.onload = function() {
            showAlert();  
        };
    </script>
</head>
    <!-- Header -->
    <header class="header">
        <img class="logo_sncf" src="/Images/logo.news.png" alt="logo_sncf"/>
        <div class="presentation">
            <h1 class="titre_principal">SNCF TICKETING</h1>
        </div>
        <nav class="nav">
            <ul>
                <li><a href="/HTML/page_creation_tickets.html">Créer un ticket</a></li>
                <li><a href="gestion_tickets.php">Voir les Tickets</a></li>
                <li><a href="/HTML/Page_accueil.html">Se déconnecter</a></li>
            </ul>
        </nav>
    </header>

         <!--PREMIER BLOC-->
         <div class="BlocGénéral">
            <div class="Bienvenue">
                <h2 class="titre2">
                    <span style="color: #00205b;">Bienvenue sur votre espace gestion des utilisateurs </span>
                    <span style="color:#82BE00;"> SNCF Ticketing </span>              
                </h2>
            </div>
        
            <a href="/PHP/page_creation_profil.php" class="btn btn-success mb-3">Créer un Utilisateur</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>                 
                    <th>Rôle</th>
                    <th>Numéro CP</th>
                    <th>Date de Création</th>
                    <th>Statut Compte</th>
                    <th>Historique Activité</th>
                    <th>Notifications</th>
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
                            <td><?php echo htmlspecialchars($row['role_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['Numéro_CP_Agent']); ?></td>
                            <td><?php echo htmlspecialchars($row['date_creation_compte']); ?></td>
                            <td><?php echo htmlspecialchars($row['statut_compte']); ?></td>
                            <td><?php echo htmlspecialchars($row['historique_activite']); ?></td>
                            <td><?php echo htmlspecialchars($row['Notifications']); ?></td>
                            <td>
                                <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Éditer</a>
                                <a href="delete_user.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="13">Aucun utilisateur trouvé</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer class="footer text-center mt-5">
        <img class="logo_sncf2" src="/Images/logo-removebg-preview.png" alt="logo_sncf2"/>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close(); // Fermer la connexion à la base de données
?>
