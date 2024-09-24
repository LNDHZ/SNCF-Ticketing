<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs - SNCF Ticketing</title>
    <link rel="stylesheet" href="/CSS/gestion_utilisateurs.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <!--HEADER-->
    <header class="header">
        <img class="logo_sncf" src="/Images/logo.news.png" alt="logo_sncf"/>
        <div class="presentation">
            <h1 class="titre_principal">SNCF TICKETING</h1>
        </div>
        <nav class="nav">
            <ul>
                <li><a href="/HTML/page_creation_tickets.html">Créer un ticket</a></li>
                <li><a href="/HTML/gestion_tickets.html">Gérer les tickets</a></li>
                <li><a href="/HTML/Page_accueil.html">Se déconnecter</a></li>
            </ul>
        </nav>
    </header>  

    <!-- SECTION PRINCIPALE -->
    <section class="BlocGénéral">
        <div class="Bienvenue">
            <h2 class="titre2"> 
                <span style="color:#82be00;">Gestion des utilisateurs</span>
            </h2>
        </div>

        <div class="table-section">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Numéro CP</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Date de Création</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP pour récupérer et afficher les utilisateurs depuis la base de données -->
                    <?php
                    // Inclure la configuration de la base de données
                    include 'includes/config.php'; // Fichier de configuration avec connexion à la base de données

                    // Requête SQL pour récupérer les utilisateurs
                    $sql = "SELECT id, nom, prenom, cp, email, role, created_at FROM users";
                    $result = mysqli_query($conn, $sql);

                    // Vérifier s'il y a des résultats
                    if (mysqli_num_rows($result) > 0) {
                        // Boucle pour afficher chaque utilisateur
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['cp']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                            echo "<td>
                                <a href='modifier_utilisateur.php?id=" . $row['id'] . "'>Modifier</a> |
                                <a href='supprimer_utilisateur.php?id=" . $row['id'] . "' onclick='return confirm(\"Voulez-vous vraiment supprimer cet utilisateur ?\");'>Supprimer</a>
                            </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>Aucun utilisateur trouvé.</td></tr>";
                    }

                    // Fermer la connexion
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <img class="logo_sncf2" src="/Images/logo-removebg-preview.png" alt="logo_sncf2"/>
        <div class="contenu_footer">
            <h3>SNCF Ticketing |
                <a href="/version.html" class="footer-link">Version 1.1</a> |
                <a href="/cgu.html" class="footer-link">CGU</a> |
                <a href="/mentions.html" class="footer-link">Mentions légales</a> |
                <a href="/HTML/page_contacts.html" class="footer-link"> Contactez-nous</a>
                e-SNCF ©2024
            </h3>
        </div>
    </footer>
</body>
</html>
