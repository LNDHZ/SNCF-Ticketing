<?php
session_start();

// Vérifiez si l'utilisateur est connecté, sinon redirigez vers la page de connexion
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirige vers la page de connexion
    exit();
}

// Inclure la connexion à la base de données
include 'connexion.php';

// Récupérer des informations sur l'utilisateur
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM utilisateurs WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - SNCF TICKETING</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/CSS/profil.css" />
</head>
<body>
    <section>
        <header class="header">
            <img class="logo_sncf" src="/Images/logo.news.png" alt="logo_sncf" />
            <div class="presentation">
                <h1 class="titre_principal">SNCF TICKETING</h1>
            </div>
            <nav class="nav justify-content-center mb-3">
                <li class="nav-item"><a class="nav-link" href="/HTML/Page_accueil.html">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="/HTML/page_creation_profil.html">Créer un compte</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Déconnexion</a></li>
            </nav>
        </header>

        <div class="container my-4">
            <h2 class="titre2">Bienvenue, <?php echo htmlspecialchars($user['prenom']); ?>!</h2>

            <h3>Vos informations</h3>
            <p>Email : <?php echo htmlspecialchars($user['email']); ?></p>
            <p>Code Postal : <?php echo htmlspecialchars($user['cp']); ?></p>

            <h3>Mes réservations</h3>
            
        </div>

        <footer class="footer">
            <img class="logo_sncf2" src="/Images/logo-removebg-preview.png" alt="logo_sncf2"/>
            <div class="contenu_footer">
                <h3>SNCF Ticketing |
                    <a href="/version.html" class="footer-link">Version 1.1</a> |
                    <a href="/HTML/cgu.html" class="footer-link">CGU</a> | 
                    <a href="/HTML/mentions.html" class="footer-link">Mentions légales</a> | 
                    <a href="/HTML/page_contacts.html" class="footer-link">Contactez-nous</a> |
                    e-SNCF ©2024 
                </h3>
            </div>
        </footer>
    </section>
</body>
</html>

