<?php
// Initialiser les variables
$errors = [];
$tickets = [];

// Traitement du formulaire lors de la soumission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer et nettoyer les données du formulaire
    $champ1 = htmlspecialchars($_POST['champ1']);
    $champ2 = htmlspecialchars($_POST['champ2']);
    $champ3 = htmlspecialchars($_POST['champ3']);
    
    // Validation des champs
    if (empty($champ1) || empty($champ2) || empty($champ3)) {
        $errors[] = "Tous les champs doivent être remplis.";
    }

    // Ajouter le ticket si aucune erreur
    if (empty($errors)) {
        $tickets[] = "$champ1 | $champ2 | $champ3";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNCF TICKETING</title>
    <link rel="stylesheet" href="/CSS/page_creation_tickets.css" />
    <script src="/JS/page_creation_tickets.js"></script>
</head>

<body>
    <section>
        <header class="header">
            <img class="logo_sncf" src="/Images/logo.news.png" alt="logo_sncf"/>
            <div class="presentation">
                <h1 class="titre_principal">SNCF TICKETING</h1>
            </div>
            <nav class="nav">
                <li><a href="/HTML/Page_utilisateur.html">Mon profil</a></li> 
                <li><a href="/HTML/Page_accueil.html">Déconnexion</a></li>
            </nav>                     
        </header>   
        
        <!-- PREMIER BLOC -->

        <div class="JeSuisUtilisateur">
            <h2 class="titre3"> Je suis utilisateur : <span style="color:#82BE00;"> SNCF Ticketing </span></h2>
        </div>

        <div class="container">
            <div class="PremierContainer">
                <p class="ticketCree"> Liste des tickets créés</p>
                <div class="listeTickets">
                    <?php
                    // Afficher les tickets créés
                    if (!empty($tickets)) {
                        foreach ($tickets as $ticket) {
                            echo "<div>{$ticket}</div>";
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="DeuxiemeContainer">
                <p class="formTickets">Formulaire de création de tickets</p>
                <button type="button" class="btnCreation">Je veux créer un ticket</button>              
                <div class="NouveauTicket">
                    <form method="post" action="">
                        <input type="text" name="champ1" class="rectangle2" placeholder="Champs Saisie">
                        <input type="text" name="champ2" class="rectangle2" placeholder="Champs Saisie">
                        <input type="text" name="champ3" class="rectangle2" placeholder="Champs Saisie"> 
                        <button type="submit" class="btnValidation">Valider</button> 
                    </form>    
                    <?php
                    // Afficher les erreurs
                    if (!empty($errors)) {
                        foreach ($errors as $error) {
                            echo "<p style='color:red;'>{$error}</p>";
                        }
                    }
                    ?>
                </div>    
            </div>
        </div>

        <footer class="footer">
            <img class="logo_sncf2" src="/Images/logo-removebg-preview.png" alt="logo_sncf2"/>
            <div class="contenu_footer">
                <h3>SNCF Ticketing | Version 1.1 | e-SNCF ©2024|CGU|Mentions légales </h3>
            </div>
        </footer> 
    </section>

    <script>
    // Fonction pour afficher/masquer le formulaire de création de tickets
    function toggleTicketForm() {
        const ticketForm = document.querySelector('.NouveauTicket');
        const createButton = document.querySelector('.btnCreation');
        
        // Vérifiez si le formulaire est actuellement visible
        if (ticketForm.style.display === "none" || !ticketForm.style.display) {
            ticketForm.style.display = "block";
            createButton.textContent = "Masquer le formulaire";
        } else {
            ticketForm.style.display = "none";
            createButton.textContent = "Je veux créer un ticket";
        }
    }

    // Écouteurs d'événements pour les boutons
    document.addEventListener('DOMContentLoaded', () => {
        // Cacher le formulaire au début
        document.querySelector('.NouveauTicket').style.display = "none";
        
        // Écouteur pour le bouton "Je veux créer un ticket"
        document.querySelector('.btnCreation').addEventListener('click', toggleTicketForm);
    });
    </script>
</body>
</html>



//Explications des modifications
PHP pour le traitement des données :

Le code PHP au début du fichier traite les données du formulaire lorsqu'il est soumis.
Les données sont nettoyées et validées.
Les erreurs sont stockées dans un tableau et les tickets sont stockés dans un autre tableau.
Affichage des tickets et des erreurs :

Les tickets créés sont affichés dans la section listeTickets.
Les erreurs de validation sont affichées en haut du formulaire si elles existent.
Formulaire HTML :

Le formulaire utilise la méthode POST pour soumettre les données au même fichier PHP.
JavaScript :

La fonction JavaScript pour afficher/masquer le formulaire reste inchangée.
Assurez-vous que votre serveur est configuré pour exécuter des fichiers PHP et que les chemins vers les fichiers CSS et JavaScript sont corrects. //