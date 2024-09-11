<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNCF TICKETING</title>
    <link rel="stylesheet" href="/CSS/page_accueil.css" />
    <script src="/Page_accueil.js"></script>
</head>

<body>
    <section>
        <header class="header">
            <img class="logo_sncf" src="/Images/logo.news.png" alt="logo_sncf"/>
            <div class="presentation">
                <h1 class="titre_principal">SNCF TICKETING</h1>
            </div>
            <nav class="nav">
                <li><a href="/HTML/Page_utilisateur.php">Se connecter</a></li>
                <li><a href="/HTML/page_creation_profil.php">Créer un compte</a></li>
            </nav>
        </header>

        <!-- PREMIER BLOC -->

        <div class="Bienvenue">
            <h2 class="titre2"> Bienvenue sur votre espace : <span style="color:#82BE00;"> SNCF Ticketing </span></h2>
        </div>
        <div class="PremierBloc">
            <img src="/Images/ilu1.png" alt="ImagePremiere" class="Image1"/>             
            <p class="Premier_Texte">
                <span style="color:#82BE00;"> SNCF Ticketing </span> vous permet de créer et de gérer des tickets <br> d'incidents ou de demande d'aide. <br>
                Un utilisateur répondra et traitera toutes vos demandes.
            </p>
        </div>
        <div class="ChampsTexteBloc">
            <form method="post" action="page_accueil.php">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" placeholder="Votre nom" />              
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Votre email" />
                <label for="demande">Votre message:</label>
                <textarea id="demande" name="demande" rows="4" placeholder="Décrivez votre demande ici..."></textarea>
                <button type="submit" name="submit">Envoyer</button>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                $nom = htmlspecialchars($_POST['nom']);
                $email = htmlspecialchars($_POST['email']);
                $demande = htmlspecialchars($_POST['demande']);

                if (empty($nom) || empty($email) || empty($demande)) {
                    echo "<p style='color:red;'>Tous les champs doivent être remplis avant l'envoi.</p>";
                } else {
                    echo "<p style='color:green;'>Votre demande a été envoyée avec succès, nous vous répondrons dans les plus brefs délais !</p>";
                    // Vous pouvez ajouter ici du code pour envoyer l'email ou stocker les données dans une base de données.
                }
            }
            ?>
        </div>          
        <div class="NavBtn">
            <button onclick="location.href='/HTML/Page1.php'">Mes informations</button>
            <button onclick="location.href='/HTML/Page2.php'">Mes informations</button>
            <button onclick="location.href='/HTML/Page3.php'">Les tickets</button>
        </div>

        <footer class="footer">
            <img class="logo_sncf2" src="/Images/logo-removebg-preview.png" alt="logo_sncf2"/>
            <div class="contenu_footer">
                <h3>SNCF Ticketing | Version 1.1 | e-SNCF ©2024 | CGU | Mentions légales </h3>
            </div>
        </footer>
    </section>

    <!-- JAVASCRIPT -->
    <script>
        const demande = document.getElementById('demande');
        const maxChars = 400;
        const counter = document.createElement('div');
        counter.id = 'charCounter';
        counter.innerHTML = `0/${maxChars}`;
        demande.parentNode.insertBefore(counter, demande.nextSibling);

        demande.addEventListener('input', function() {
            const charCount = demande.value.length;
            counter.innerHTML = `${charCount}/${maxChars}`;
            if (charCount > maxChars) {
                counter.style.color = 'red';
            } else {
                counter.style.color = 'black';
            }
        });
    </script>
</body>
</html>
