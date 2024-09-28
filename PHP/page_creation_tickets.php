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
            alert("Bienvenue sur votre la page de création de ticket, SNCF Ticketing!");
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

            <!-- FORMULAIRE DE CRÉATION ET D'ÉDITION DE TICKET -->
            <div class="form-container">
                <h1><?php echo isset($_GET['id']) ? "Éditer un Ticket d'incident" : "Créer un Ticket d'incident"; ?></h1>
                
       <!-- Début du code PHP -->
                <?php
                require 'includes/db_connexion.php'; 

                $message = '';
                $ticket = null; // Initialiser le ticket

                // Vérifie si le formulaire a été soumis
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Récupère les valeurs du formulaire
                    $cp = htmlspecialchars($_POST['cp']);
                    $category = htmlspecialchars($_POST['category']);
                    $subject = htmlspecialchars($_POST['subject']);
                    $priority = htmlspecialchars($_POST['priority']);
                    $description = htmlspecialchars($_POST['description']);

                    if (isset($_GET['id'])) {
                        // Édition du ticket
                        $stmt = $pdo->prepare("UPDATE tickets SET cree_par = ?, category = ?, subject = ?, priority = ?, description = ? WHERE id = ?");
                        $stmt->execute([$cp, $category, $subject, $priority, $description, $_GET['id']]);
                        $message = "Le ticket a été mis à jour avec succès !";
                    } else {
                        // Création d'un nouveau ticket
                        $stmt = $pdo->prepare("INSERT INTO tickets (cree_par, category, subject, priority, description) VALUES (?, ?, ?, ?, ?)");
                        $stmt->execute([$cp, $category, $subject, $priority, $description]);
                        $message = "Votre ticket a été créé avec succès !";
                    }
                }

                // Vérifie si un ID de ticket est présent pour l'édition
                if (isset($_GET['id'])) {
                    $stmt = $pdo->prepare("SELECT * FROM tickets WHERE id = ?");
                    $stmt->execute([$_GET['id']]);
                    $ticket = $stmt->fetch();
                }
                ?> -->
                <!-- Fin du code PHP -->

                <!-- Affichage du message de confirmation -->
                <?php if ($message): ?>
                    <div class='alert alert-success'><?php echo $message; ?></div>
                <?php endif; ?>

                <form action="" method="POST">
                    <label for="cp">Numéro de CP *</label>
                    <input type="text" id="cp" name="cp" placeholder="Votre numéro de CP" required maxlength="8" value="<?php echo isset($ticket) ? htmlspecialchars($ticket['cree_par']) : ''; ?>">

                    <label for="category">Rôle *</label>
                    <select id="role" name="category" required>
                        <option value="" disabled <?php echo !isset($ticket) ? 'selected' : ''; ?>>Quel est votre rôle ?</option>
                        <option value="technique" <?php echo isset($ticket) && $ticket['category'] == 'technique' ? 'selected' : ''; ?>>Utilisateur</option>
                        <option value="service" <?php echo isset($ticket) && $ticket['category'] == 'service' ? 'selected' : ''; ?>>Administrateur</option>
                        <option value="autre" <?php echo isset($ticket) && $ticket['category'] == 'autre' ? 'selected' : ''; ?>>Support technique</option>
                    </select>

                    <label for="subject">Sujet de l'incident *</label>
                    <input type="text" id="subject" name="subject" placeholder="Sujet de l'incident" required value="<?php echo isset($ticket) ? htmlspecialchars($ticket['subject']) : ''; ?>">

                    <label for="category">Catégorie *</label>
                    <select id="category" name="category" required>
                        <option value="" disabled <?php echo !isset($ticket) ? 'selected' : ''; ?>>Choisir une catégorie</option>
                        <option value="technique" <?php echo isset($ticket) && $ticket['category'] == 'Power Apps' ? 'selected' : ''; ?>>Power Apps</option>
                        <option value="service" <?php echo isset($ticket) && $ticket['category'] == 'Power BI' ? 'selected' : ''; ?>>Power BI</option>
                        <option value="autre" <?php echo isset($ticket) && $ticket['category'] == 'Power Automate' ? 'selected' : ''; ?>>Power Automate</option>
                    </select>

                    <label for="priority">Priorité *</label>
                    <select id="priority" name="priority" required>
                        <option value="" disabled <?php echo !isset($ticket) ? 'selected' : ''; ?>>Choisir une priorité</option>
                        <option value="faible" <?php echo isset($ticket) && $ticket['priority'] == 'faible' ? 'selected' : ''; ?>>Faible</option>
                        <option value="moyenne" <?php echo isset($ticket) && $ticket['priority'] == 'moyenne' ? 'selected' : ''; ?>>Moyenne</option>
                        <option value="élevée" <?php echo isset($ticket) && $ticket['priority'] == 'élevée' ? 'selected' : ''; ?>>Élevée</option>
                        <option value="haute" <?php echo isset($ticket) && $ticket['priority'] == 'haute' ? 'selected' : ''; ?>>Haute</option>
                    </select>

                    <label for="description">Description brève et précise *</label>
                    <textarea id="description" name="description" placeholder="Décrivez l'incident" required><?php echo isset($ticket) ? htmlspecialchars($ticket['description']) : ''; ?></textarea>

                    <button type="submit" class="custom-button">
                        <?php echo isset($ticket) ? "Éditer le Ticket" : "Créer le Ticket"; ?>
                    </button>
                    
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
        </div>       
    </section>       
</body>
</html>
