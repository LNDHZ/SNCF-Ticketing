<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNCF TICKETING</title>
    <link rel="stylesheet" href="/CSS/page_gestionnaire.css" />
    <script src="/JS/page_gestionnaire.js"></script>
</head>

<body>
    <section>
        <header class="header">
            <img class="logo_sncf" src="/Images/logo.news.png" alt="logo_sncf"/>
            <div class="presentation">
                <h1 class="titre_principal">SNCF TICKETING</h1>
            </div>
            <nav class="nav">
                <li><a href="/HTML/page_gestionnaire.php">Mon profil</a></li>
                <li><a href="/HTML/Page_accueil.php">Déconnexion</a></li>
            </nav>                    
        </header>      

        <!-- PREMIER BLOC -->

        <div class="Bienvenue">
            <h2 class="titre2"> Je suis gestionnaire: <span style="color:#82BE00;"> SNCF Ticketing </span></h2>
        </div>

        <main class="contenu">
            <div class="ContainerTickets">
                <section class="ListeTickets">
                    <h2>Liste des tickets en cours</h2>
                    <?php
                    // Exemple de données de tickets
                    $ticketsEnCours = [
                        ['title' => 'Problème de connexion', 'content' => "L'utilisateur de Power Apps ne parvient pas à rafraîchir sa page.", 'status' => 'En cours de traitement'],
                        ['title' => "Problème d'initialisation de l'application", 'content' => "La fenêtre se ferme automatiquement après ouverture de celle-ci.", 'status' => 'En cours de traitement']
                    ];

                    foreach ($ticketsEnCours as $ticket) {
                        echo "<div class='ticket'>
                            <h4 class='TitreTicket'>{$ticket['title']}</h4>
                            <p class='ContenuTicket'> ==> {$ticket['content']}</p>
                            <p class='StatutTicket'>Statut : {$ticket['status']}</p>
                        </div>";
                    }
                    ?>
                </section>
                <section class="ClotureTickets">
                    <h2>Tickets Clôturés</h2>
                    <?php
                    // Exemple de données de tickets clôturés
                    $ticketsClotures = [
                        ['title' => 'Problème de mise à jour', 'content' => "Mise à jour réussie après réinstallation de l'application.", 'status' => 'Clôturé']
                    ];

                    foreach ($ticketsClotures as $ticket) {
                        echo "<div class='ticket'>
                            <h4 class='TitreTicket'>{$ticket['title']}</h4>
                            <p class='ContenuTicket'> ==> {$ticket['content']}</p>
                            <p class='StatutTicket'>Statut : {$ticket['status']}</p>
                        </div>";
                    }
                    ?>
                </section>
            </div>
        </main>     
        <div class="Statut">
            <select id="StatutFiltrer">
                <option value="Tous">Tous les tickets</option>
                <option value="En cours de traitement">En cours de traitement</option>
                <option value="Clôturé">Clôturé</option>
            </select>
            <input type="text" id="searchInput" placeholder="Rechercher des tickets...">
        </div>

        <footer class="footer">
            <img class="logo_sncf2" src="/Images/logo-removebg-preview.png" alt="logo_sncf2"/>
            <div class="contenu_footer">
                <h3>SNCF Ticketing | Version 1.1 | e-SNCF ©2024 | CGU | Mentions légales </h3>
            </div>
        </footer>
    </section>

    <script>
    // Filtrer les tickets en fonction du statut sélectionné
    function filterTickets(status) {
        const allTickets = document.querySelectorAll('.ticket');
        
        allTickets.forEach(ticket => {
            const ticketStatus = ticket.querySelector('.StatutTicket').textContent.split(':')[1].trim();
            if (status === 'Tous' || ticketStatus === status) {
                ticket.style.display = 'block';
            } else {
                ticket.style.display = 'none';
            }
        });
    }

    // Écouter les changements du filtre
    document.getElementById('StatutFiltrer').addEventListener('change', function() {
        filterTickets(this.value);
    });
    </script>
</body>
</html>
