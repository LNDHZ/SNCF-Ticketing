<?php
// Connexion à la base de données
$servername = "votre_nom_de_serveur";
$username = "votre_nom_utilisateur";
$password = "votre_mot_de_passe";
$dbname = "votre_nom_de_base_de_données";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer l'ID du ticket à partir de l'URL
$id = $_GET['id'];

// Récupérer les données du ticket
$sql = "SELECT * FROM table_tickets WHERE id = $id";
$result = $conn->query($sql);
$ticket = $result->fetch_assoc();

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $titre = $_POST['titre_ticket'];
    $description = $_POST['description_ticket'];
    $date_creation = $_POST['date_creation_ticket'];
    $date_modif = date("Y-m-d H:i:s"); // Mettre à jour la date de modification
    $utilisateur_id = $_POST['utilisateur_id'];
    $categorie_id = $_POST['categorie_id'];
    $statut_id = $_POST['statut_id'];
    $priorite_id = $_POST['priorite_id'];
    $date_cloture = $_POST['date_cloture'];
    $cree_par = $_POST['cree_par'];
    $commentaire_resolution = $_POST['commentaire_resolution'];

    // Mettre à jour le ticket dans la base de données
    $update_sql = "UPDATE table_tickets 
                   SET titre_ticket='$titre', description_ticket='$description', date_modif_ticket='$date_modif', utilisateur_id='$utilisateur_id', 
                       categorie_id='$categorie_id', statut_id='$statut_id', priorite_id='$priorite_id', date_cloture='$date_cloture', 
                       cree_par='$cree_par', commentaire_resolution='$commentaire_resolution' 
                   WHERE id=$id";
    if ($conn->query($update_sql) === TRUE) {
        echo "Ticket mis à jour avec succès.";
        header("Location: gestion_tickets.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour du ticket : " . $conn->error;
    }
}

// Fermer la connexion
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Éditer le Ticket</title>
    <link rel="stylesheet" href="style.css"> <!-- Si vous avez un fichier CSS -->
</head>
<body>
    <h1>Éditer le Ticket</h1>
    <form method="POST">
        <label>Titre:</label>
        <input type="text" name="titre_ticket" value="<?php echo htmlspecialchars($ticket['titre_ticket']); ?>" required>

        <label>Description:</label>
        <textarea name="description_ticket" required><?php echo htmlspecialchars($ticket['description_ticket']); ?></textarea>

        <label>Date de Création:</label>
        <input type="datetime-local" name="date_creation_ticket" value="<?php echo htmlspecialchars(date('Y-m-d\TH:i', strtotime($ticket['date_creation_ticket']))); ?>" required>

        <label>Date de Clôture:</label>
        <input type="datetime-local" name="date_cloture" value="<?php echo htmlspecialchars(date('Y-m-d\TH:i', strtotime($ticket['date_cloture']))); ?>">

        <label>Utilisateur ID:</label>
        <input type="text" name="utilisateur_id" value="<?php echo htmlspecialchars($ticket['utilisateur_id']); ?>" required>

        <label>Catégorie ID:</label>
        <input type="text" name="categorie_id" value="<?php echo htmlspecialchars($ticket['categorie_id']); ?>" required>

        <label>Statut ID:</label>
        <input type="text" name="statut_id" value="<?php echo htmlspecialchars($ticket['statut_id']); ?>" required>

        <label>Priorité ID:</label>
        <input type="text" name="priorite_id" value="<?php echo htmlspecialchars($ticket['priorite_id']); ?>" required>

        <label>Créé Par:</label>
        <input type="text" name="cree_par" value="<?php echo htmlspecialchars($ticket['cree_par']); ?>" required>

        <label>Commentaire de Résolution:</label>
        <textarea name="commentaire_resolution"><?php echo htmlspecialchars($ticket['commentaire_resolution']); ?></textarea>

        <input type="submit" value="Mettre à jour">
    </form>
</body>
</html>
