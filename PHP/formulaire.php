<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Ticket</title>
</head>
<body>
    <h1>Ajouter un Ticket</h1>
    <form action="ajouter_ticket.php" method="post">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required><br>

        <label for="cree_par">Créé par :</label>
        <input type="number" id="cree_par" name="cree_par" required><br>

        <label for="statut">Statut :</label>
        <select id="statut" name="statut" required>
            <option value="Ouvert">Ouvert</option>
            <option value="en cours">en cours</option>
            <option value="résolu">résolu</option>
            <option value="fermé">fermé</option>
        </select><br>

        <label for="priorite">Priorité :</label>
        <select id="priorite" name="priorite" required>
            <option value="basse">basse</option>
            <option value="moyenne">moyenne</option>
            <option value="élevée">élevée</option>
            <option value="haute">haute</option>
        </select><br>

        <label for="categorie">Catégorie :</label>
        <select id="categorie" name="categorie" required>
            <option value="Power Apps">Power Apps</option>
            <option value="Power Bi">Power Bi</option>
            <option value="Power Automate">Power Automate</option>
            <!-- Ajoutez d'autres catégories si nécessaire -->
        </select><br>

        <label for="commentaire_resolution">Commentaire de résolution :</label>
        <textarea id="commentaire_resolution" name="commentaire_resolution"></textarea><br>

        <input type="submit" value="Ajouter le Ticket">
    </form>
</body>
</html>
