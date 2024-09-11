<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SNCF TICKETING</title>
    <link rel="stylesheet" href="/CSS/page_creation_profil.css" />
    <script src="/JS/Page_creation_profil.js"></script>
</head>

<body>
    <section>
        <header class="header">
            <img class="logo_sncf" src="/Images/logo.news.png" alt="logo_sncf" />
            <div class="presentation">
                <h1 class="titre_principal">SNCF TICKETING</h1>
            </div>
        </header>

        <!-- PREMIER BLOC -->

        <div class="Bienvenue">
            <h2 class="titre2">
                Je crée mon espace :
                <span style="color: #82be00"> SNCF Ticketing </span>
            </h2>
        </div>
        <hr class="Separateur1" />

        <!-- DEUXIEME BLOC -->
        <div class="main-container">
            <div class="Ensemble">
                <form method="post" action="page_creation_profil.php" onsubmit="return validateForm()">
                    <input type="text" id="nom" name="nom" class="input-rectangle" placeholder="Nom">
                    <input type="text" id="prenom" name="prenom" class="input-rectangle" placeholder="Prénom">
                    <input type="text" id="cp" name="cp" class="input-rectangle" placeholder="Numéro de CP">
                    <input type="email" id="email" name="email" class="input-rectangle" placeholder="Adresse mail">
                    <input type="password" id="mdp" name="mdp" class="input-rectangle" placeholder="Mot de passe">
                    <input type="password" id="mdp2" name="mdp2" class="input-rectangle" placeholder="Confirmation du mot de passe">
                    <input type="checkbox" id="terms" name="terms" class="input-rectangle3">
                    <label for="terms">J'accepte les conditions</label>
                    <button type="submit" class="save-button">Enregistrer</button>
                </form>
            </div>
            <div class="image-container">
                <img src="/Images/ilu1.png" alt="Image2" class="image_droite">
            </div>
        </div>

        <!-- FOOTER -->

        <footer class="footer">
            <img class="logo_sncf2" src="/Images/logo-removebg-preview.png" alt="logo_sncf2" />
            <div class="contenu_footer">
                <h3>
                    SNCF Ticketing | Version 1.1 | e-SNCF ©2024 | CGU | Mentions légales
                </h3>
            </div>
        </footer>
    </section>

    <!-- JAVASCRIPT -->
    <script>
        function validateForm() {
            // Récupérer les valeurs des champs
            const nom = document.getElementById('nom').value;
            const prenom = document.getElementById('prenom').value;
            const cp = document.getElementById('cp').value;
            const email = document.getElementById('email').value;
            const mdp = document.getElementById('mdp').value;
            const mdp2 = document.getElementById('mdp2').value;
            const terms = document.getElementById('terms').checked;

            // Validation des champs
            if (nom === "" || prenom === "" || cp === "" || email === "" || mdp === "" || mdp2 === "") {
                alert("Tous les champs doivent être remplis.");
                return false;
            }

            // Vérifier le format de l'email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("Veuillez entrer une adresse email valide.");
                return false;
            }

            // Vérifier que les mots de passe correspondent
            if (mdp !== mdp2) {
                alert("Les mots de passe ne correspondent pas.");
                return false;
            }

            // Vérifier que la case des conditions est cochée
            if (!terms) {
                alert("Vous devez accepter les conditions.");
                return false;
            }

            // Si toutes les validations sont passées
            alert("Votre compte a été créé avec succès !");
            return true;
        }
    </script>
</body>
</html>
