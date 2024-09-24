<!DOCTYPE html>
<html lang="fr">

<!--HEAD-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNCF TICKETING</title>
    <link rel="stylesheet" href="/CSS/page_creation_tickets.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="/JS/page_creation_tickets.js"></script>
    <script>
        function showAlert() {
            alert("Bienvenue sur votre la page des CGU, SNCF Ticketing!");
        }
       
        window.onload = function() {
            showAlert();  
        };
    </script>
</head>

<body>
    <section>
        <header class="header">
            <img class="logo_sncf" src="/Images/logo.news.png" alt="logo_sncf"/>
            <div class="presentation">
                <h1 class="titre_principal">SNCF TICKETING</h1>
            </div>
            <nav class="nav">
                <li><a href="/HTML/Page_utilisateur.html">Se connecter</a></li>
                <li><a href="/HTML/page_creation_profil.html">Créer un compte</a></li>
            </nav>
        </header>  
            
        <!--PREMIER BLOC-->
        <div class="BlocGénéral">
            <div class="Bienvenue">
                <h2 class="titre2"> 
                    <span style="color: #00205b;">Bienvenue sur la page de création de ticket </span>
                    <span style="color:#82BE00;"> SNCF Ticketing </span>          
                </h2>
            </div>

            <!-- FORMULAIRE DE CRÉATION DE TICKET -->
            <div class="form-container">
                <h1>Créer un Ticket d'incident</h1>
                
                <!-- Début du code PHP -->
                <?php
                // Vérifie si le formulaire a été soumis
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Récupère les valeurs du formulaire
                    $cp = htmlspecialchars($_POST['cp']);
                    $category = htmlspecialchars($_POST['category']);
                    $subject = htmlspecialchars($_POST['subject']);
                    $priority = htmlspecialchars($_POST['priority']);
                    $description = htmlspecialchars($_POST['description']);

                    // Affichage d'un message de confirmation (ou tu peux l'enregistrer dans une base de données)
                    echo "<div class='alert alert-success'>Votre ticket a été créé avec succès !</div>";
                    echo "<strong>Numéro de CP:</strong> $cp <br>";
                    echo "<strong>Rôle:</strong> $category <br>";
                    echo "<strong>Sujet:</strong> $subject <br>";
                    echo "<strong>Priorité:</strong> $priority <br>";
                    echo "<strong>Description:</strong> $description <br>";
                }
                ?>
                <!-- Fin du code PHP -->

                <form action="" method="POST">
                    <label for="cp">Numéro de CP *</label>
                    <input type="text" id="cp" name="cp" placeholder="Votre numéro de CP" required maxlength="8">

                    <label for="category">Rôle*</label>
                    <select id="role" name="category" required>
                        <option value="" disabled selected>Quel est votre rôle ?</option>
                        <option value="technique">Utilisateur</option>
                        <option value="service">Administrateur</option>
                        <option value="autre">Support technique</option>
                    </select>

                    <label for="subject">Sujet de l'incident *</label>
                    <input type="text" id="subject" name="subject" placeholder="Sujet de l'incident" required>

                    <label for="category">Catégorie *</label>
                    <select id="category" name="category" required>
                        <option value="" disabled selected>Choisir une catégorie</option>
                        <option value="technique">Power Apps</option>
                        <option value="service">Power BI</option>
                        <option value="autre">Power Automate</option>
                    </select>

                    <label for="priority">Priorité *</label>
                    <select id="priority" name="priority" required>
                        <option value="" disabled selected>Choisir une priorité</option>
                        <option value="faible">Faible</option>
                        <option value="moyenne">Moyenne</option>
                        <option value="élevée">Élevée</option>
                        <option value="haute">Haute</option>
                    </select>

                    <label for="description">Description brève et précise *</label>
                    <textarea id="description" name="description" placeholder="Décrivez l'incident" required></textarea>

                    <button type="submit">Créer le Ticket</button>
                </form>
            </div>

            <footer class="footer">
                <img class="logo_sncf2" src="/Images/logo-removebg-preview.png" alt="logo_sncf2"/>
                <div class="contenu_footer">
                    <h3>SNCF Ticketing |
                        <a href="/version.html" class="footer-link">Version 1.1</a> |
                        <a href="/cgu.html" class="footer-link">CGU</a> | 
                        <a href="/mentions-legales.html" class="footer-link">Mentions légales</a> | 
                        <a href="/HTML/page_contacts.html" class="footer-link"> Contactez-nous</a>
                        e-SNCF ©2024 
                    </h3>
                </div>
            </footer>
        </section>       
    </body>
</html>