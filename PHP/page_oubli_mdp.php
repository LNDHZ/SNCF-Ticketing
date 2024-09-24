<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Réinitialisation du mot de passe - SNCF Ticketing</title>
    <link rel="stylesheet" href="/CSS/page_oubli_mdp.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="/JS/connexion.js"></script>
</head>

<body>
    <!-- SECTION -->
    <section>
        <!-- HEADER -->
        <header class="header">
            <img class="logo_sncf" src="/Images/logo.news.png" alt="logo_sncf" />
            <div class="presentation">
                <h1 class="titre_principal">SNCF TICKETING</h1>
            </div>
            <nav class="nav justify-content-center mb-3">
                <li class="nav-item"><a class="nav-link" href="/HTML/Page_accueil.html">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="/HTML/page_creation_profil.html">Créer un compte</a></li>
            </nav>
        </header>

        <!-- TITRE DU FORMULAIRE -->
        <div class="Bienvenue">
            <h2 class="titre2"> Réinitialiser mon mot de passe<span style="color: #82be00"> SNCF Ticketing </span></h2>       
        </div>

        <!-- FORMULAIRE -->
        <form id="forgotPasswordForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h1 class="form-title">Mot de passe oublié</h1>
            <p class="info-text">
                Veuillez entrer votre adresse e-mail. Un lien pour réinitialiser votre mot de passe vous sera envoyé.
            </p>
            <div class="inputs">
                <input type="email" id="email" name="email" placeholder="Adresse e-mail" required />
            </div>
            <div align="center">
                <button type="submit">Envoyer le lien de réinitialisation</button>
            </div>
        </form>

        <?php
        // Traitement du formulaire
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer l'adresse e-mail
            $email = $_POST['email'];

            // Ici, tu peux ajouter du code pour envoyer l'e-mail, par exemple avec mail()
            // mail($email, "Réinitialisation du mot de passe", "Voici le lien pour réinitialiser votre mot de passe...");

            // Pour l'instant, on va juste afficher un message de confirmation
            echo "<script>alert('Un lien de réinitialisation de mot de passe a été envoyé à $email.');</script>";
            // Rediriger vers une autre page après la soumission (optionnel)
            // header("Location: page_suivante.html");
            // exit();
        }
        ?>

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
    </section>
</body>
</html>
