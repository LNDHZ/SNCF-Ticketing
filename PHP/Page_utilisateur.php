<?php
// Initialiser les variables
session_start(); // Démarrer la session pour accéder aux variables de session

// Exemple d'initialisation de variables (à remplacer par des valeurs réelles ou des données dynamiques)
$nomUtilisateur = isset($_SESSION['nom_utilisateur']) ? $_SESSION['nom_utilisateur'] : 'Invité';

// Autres traitements PHP peuvent être ajoutés ici
?>

<!DOCTYPE html>
<html lang="fr">

<!--HEAD-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNCF TICKETING</title>
    <link rel="stylesheet" href="/CSS/page_utilisateur.css" />
</head>

<!--BODY-->
<body>
    <section>
        <header class="header">
            <img class="logo_sncf" src="/Images/logo.news.png" alt="logo_sncf"/>
            <div class="presentation">
                <h1 class="titre_principal">SNCF TICKETING</h1>
            </div>
        </header>   
        
        <!--PREMIER BLOC-->
        <div class="PremierBloc">
            <div class="Bienvenue">
                <h2 class="titre2">Bonjour, <span style="color:#82BE00;"><?php echo htmlspecialchars($nomUtilisateur); ?></span> !</h2>
            </div>     
            <div class="imageDroite">
                <img src="/Images/page_accomp_clients.jpg" alt="image3" class="imageAgrandie">
            </div>
        </div>  

        <!--DEUXIEME BLOC-->
        <div class="DeuxiemeBloc">
            <div class="formulaire">
                <label for="label" class="checkboxLabel">Titre informatif</label>
                <div class="separateur2"></div>
                <label for="label" class="checkboxLabel">Titre informatif</label>
            </div>
        </div>
        <div class="champsSaisie">
            <input type="text" id="infoInput" class="inputField" placeholder="Champs de saisie"/>       
        </div>
        
        <!--QUATRIEME BLOC-->   
        <div class="ContainerCheckbox">
            <input type="checkbox" id="checkbox1" class="checkbox">
            <label for="checkbox1" class="checkboxLabel">Checkbox</label>              
        </div>              
       
        <!--CINQUIEME BLOC-->
        <div class="btnContainer">
            <a href="/HTML/page_profil.php" class="btn BtnConnexion">Connexion</a>
            <a href="/HTML/page_creation_profil.php" class="btn BtnCompte">Création de compte</a>
            <a href="/HTML/Page_accueil.php" class="btn BtnMdpOublie">Mot de passe oublié</a>          
        </div> 

        <footer class="footer">
            <img class="logo_sncf2" src="/Images/logo-removebg-preview.png" alt="logo_sncf2"/>
            <div class="contenu_footer">
                <h3>SNCF Ticketing | Version 1.1 | e-SNCF ©2024|CGU|Mentions légales </h3>
            </div>
        </footer>
    </section>
</body>
</html>


//Explications des modifications :
Démarrage de la session PHP :

session_start(); est utilisé pour démarrer la session afin de pouvoir accéder aux variables de session.
Affichage dynamique du nom de l'utilisateur :

Utilisation de PHP pour afficher le nom de l'utilisateur dans l'en-tête. La fonction htmlspecialchars() est utilisée pour éviter les problèmes de sécurité liés aux caractères spéciaux.
Modification des liens :

Les liens pointent vers des fichiers PHP (par exemple, page_profil.php), ce qui est nécessaire pour que les pages PHP puissent être traitées correctement.
Gestion des données :

Si vous souhaitez manipuler des données utilisateur ou gérer des sessions, vous pouvez ajouter des scripts PHP supplémentaires pour le traitement et la gestion des données.
Veillez à adapter les chemins des fichiers et le contenu en fonction des besoins réels de votre application. Assurez-vous également que votre serveur est configuré pour exécuter PHP. //