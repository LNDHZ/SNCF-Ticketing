<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Ticket</title>
    <!-- Lien vers Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <body>
    <!-- HEADER -->
    <header class="header">
        <img class="logo_sncf" src="/Images/logo.news.png" alt="logo_sncf" />
        <div class="presentation">
            <h1 class="titre_principal">SNCF TICKETING</h1>
        </div>
    </header>

    <div class="container">
        <h1>Ajouter un Ticket</h1>
        <form action="ajouter_ticket.php" method="post">
            <div class="form-group">
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="cree_par">Créé par :</label>
                <input type="number" id="cree_par" name="cree_par" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="statut">Statut :</label>
                <select id="statut" name="statut" class="form-control" required>
                    <option value="Ouvert">Ouvert</option>
                    <option value="en cours">en cours</option>
                    <option value="résolu">résolu</option>
                    <option value="fermé">fermé</option>
                </select>
            </div>

            <div class="form-group">
                <label for="priorite">Priorité :</label>
                <select id="priorite" name="priorite" class="form-control" required>
                    <option value="basse">basse</option>
                    <option value="moyenne">moyenne</option>
                    <option value="élevée">élevée</option>
                    <option value="haute">haute</option>
                </select>
            </div>

            <div class="form-group">
                <label for="categorie">Catégorie :</label>
                <select id="categorie" name="categorie" class="form-control" required>
                    <option value="Power Apps">Power Apps</option>
                    <option value="Power Bi">Power Bi</option>
                    <option value="Power Automate">Power Automate</option>
                    <!-- Ajoutez d'autres catégories si nécessaire -->
                </select>
            </div>

            <div class="form-group">
                <label for="commentaire_resolution">Commentaire de résolution :</label>
                <textarea id="commentaire_resolution" name="commentaire_resolution" class="form-control"></textarea>
            </div>

            <input type="submit" class="btn btn-primary" value="Ajouter le Ticket">
        </form>
    </div>

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
</body>
</html>