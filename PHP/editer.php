<?php
require 'db_connexion.php'; // Inclure votre fichier de connexion à la base de données

// Initialiser une variable pour le message de succès
$message = "";

// Vérifiez si l'ID du ticket est fourni dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer le ticket à modifier
    $stmt = $pdo->prepare("SELECT * FROM tickets WHERE id = ?");
    $stmt->execute([$id]);
    $ticket = $stmt->fetch();

    // Si le ticket n'existe pas, redirigez ou affichez un message d'erreur
    if (!$ticket) {
        die("Ticket non trouvé !");
    }

    // Vérifiez si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $description = $_POST['description'];
        $etat = $_POST['etat'];
        $priorite = $_POST['priorite'];

        // Préparer et exécuter la requête de mise à jour
        $stmt = $pdo->prepare("UPDATE tickets SET description = ?, etat = ?, priorite = ? WHERE id = ?");
        $stmt->execute([$description, $etat, $priorite, $id]);

        // Message de succès
        $message = "Ticket mis à jour avec succès !";
        // Optionnel : redirection vers une autre page
        // header("Location: gestion_tickets.php");
        // exit();
    }
} else {
    die("Aucun ID de ticket spécifié !");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer un Ticket - SNCF Ticketing</title>
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
        <h2 class="titre2">Éditer le Ticket</h2>
        
        <!-- Afficher le message de succès -->
        <?php if ($message): ?>
            <div class="alert alert-success">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- FORMULAIRE -->
        <form method="POST" action="editer.php?id=<?php echo $ticket['id']; ?>">
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" class="form-control" value="<?php echo htmlspecialchars($ticket['description']); ?>" required>
            </div>
            <div class="form-group">
                <label for="etat">État</label>
                <input type="text" id="etat" name="etat" class="form-control" value="<?php echo htmlspecialchars($ticket['etat']); ?>" required>
            </div>
            <div class="form-group">
                <label for="priorite">Priorité</label>
                <select id="priorite" name="priorite" class="form-control" required>
                    <option value="basse" <?php echo ($ticket['priorite'] == 'basse') ? 'selected' : ''; ?>>Basse</option>
                    <option value="moyenne" <?php echo ($ticket['priorite'] == 'moyenne') ? 'selected' : ''; ?>>Moyenne</option>
                    <option value="haute" <?php echo ($ticket['priorite'] == 'haute') ? 'selected' : ''; ?>>Haute</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour le Ticket</button>
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
