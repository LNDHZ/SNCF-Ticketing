<?php
require 'db_connexion.php'; // Assurez-vous que le chemin est correct pour votre fichier de connexion à la base de données

// Initialiser une variable pour le message de succès
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $description = $_POST['description'];
    $etat = $_POST['etat'];
    $priorite = $_POST['priorite'];

    // Préparer et exécuter la requête d'insertion
    $stmt = $pdo->prepare("INSERT INTO tickets (description, etat, priorite) VALUES (?, ?, ?)");
    $stmt->execute([$description, $etat, $priorite]);

    // Message de succès
    $message = "Ticket créé avec succès !";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Ticket - SNCF Ticketing</title>
    <link rel="stylesheet" href="/CSS/page_oubli_mdp.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- HEADER -->
    <header class="header">
        <img class="logo_sncf" src="/Images/logo.news.png" alt="logo_sncf" />
        <div class="presentation">
            <h1 class="titre_principal">SNCF TICKETING</h1>
        </div>
    </header>

    <div class="container">
        <h2 class="titre2">Créer un Ticket</h2>
        
        <!-- Afficher le message de succès -->
        <?php if ($message): ?>
            <div class="alert alert-success">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- FORMULAIRE -->
        <form method="POST" action="create_ticket.php">
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="etat">État</label>
                <input type="text" id="etat" name="etat" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="priorite">Priorité</label>
                <select id="priorite" name="priorite" class="form-control" required>
                    <option value="basse">Basse</option>
                    <option value="moyenne">Moyenne</option>
                    <option value="haute">Haute</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Créer le Ticket</button>
        </form>
    </div>

    <!-- FOOTER -->
    <footer class="footer">
        <img class="logo_sncf2" src="/Images/logo-removebg-preview.png" alt="logo_sncf2" />
        <div class="contenu_footer">
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
