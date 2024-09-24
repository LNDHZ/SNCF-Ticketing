<!DOCTYPE html>
<html lang="fr">
<!--HEAD-->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SNCF TICKETING</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/JS/connexion.js"></script>
    <script>
      function showAlert() {
          alert("Bienvenue sur votre page de connexion, SNCF Ticketing!");
      }
     
      window.onload = function() {
          showAlert();  
      };
  </script>
</head>

<!--BODY-->

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
      </nav>
    </header>

    <!--PREMIER BLOC-->

    <h2 class="titre2">
      <span style="color: #00205b; margin-right: 30px;">Je me connecte à mon espace</span>
      <span style="color:#82BE00;">SNCF Ticketing</span>          
    </h2>

    <!-- Formulaire de connexion -->
    <form id="loginForm" method="POST" action="login.php"> <!-- Utilisation de POST -->
        <h1 class="form-title">Je me connecte à mon compte</h1>

        <div class="inputs">                            
            <label for="email">E-mail *</label>
            <input type="email" id="email" name="email" placeholder="Mon adresse mail" required>
            <label for="cp">Numéro de CP*</label>
            <input type="text" id="cp" name="cp" placeholder="Numéro de CP" maxlength="8" required>                     
            <label for="password">Mot de passe *</label>
            <input type="password" id="password" name="password" placeholder="Mot de passe" required>
        </div>
        <a href="/HTML/page_oubli_mdp.html" class="forgot-password">J'ai oublié mon mot de passe</a>
        <button type="submit" class="submit-btn">Continuer</button>            
    </form>       

   <!--FOOTER-->
   <footer class="footer">
      <img class="logo_sncf2" src="/Images/logo-removebg-preview.png" alt="logo_sncf2"/>
      <div class="contenu_footer">
        <h3>SNCF Ticketing |
          <a href="/version.html" class="footer-link">Version 1.1</a> |
          <a href="/HTML/cgu.html" class="footer-link">CGU</a> | 
          <a href="/HTML/mentions.html" class="footer-link">Mentions légales</a> | 
          <a href="/HTML/page_contacts.html" class="footer-link"> Contactez-nous</a>|
           e-SNCF ©2024 
        </h3>
      </div>
    </footer>
  </section>

<!-- PHP pour traiter les données du formulaire -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclure le fichier de configuration (connexion à la base de données)
    include 'config.php';  // config.php doit contenir les détails de la connexion à la base de données

    // Récupérer les données du formulaire
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $cp = mysqli_real_escape_string($conn, $_POST['cp']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Requête pour vérifier les informations de l'utilisateur dans la base de données
    $query = "SELECT * FROM users WHERE email = '$email' AND cp = '$cp'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // L'utilisateur a été trouvé, vérifier le mot de passe
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {  // password_verify pour comparer les mots de passe hashés
            // Connexion réussie, rediriger l'utilisateur vers la page de gestion
            header('Location: gestion_utilisateurs.php');
            exit;
        } else {
            echo "<p style='color:red; text-align:center;'>Mot de passe incorrect</p>";
        }
    } else {
        echo "<p style='color:red; text-align:center;'>Email ou Numéro de CP incorrect</p>";
    }

    // Fermer la connexion
    mysqli_close($conn);
}
?>
</body>
</html>