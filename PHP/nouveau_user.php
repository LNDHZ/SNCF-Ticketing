<?php
include 'db_connexion.php';

// Récupération des données du formulaire
$id = $_POST['id'];
$nom = $_POST['nom_user'];
$prenom = $_POST['prenom_user'];
$email = $_POST['email_user'];
$mdp = $_POST['mot_de_passe_user'];
$mdp2 = $_POST['confirm_mdp'];
$role = $_POST['role_id'];
$CP = $_POST['Numéro_CP_Agent'];
$date_crea = $_POST['date_creation_compte'];
$statut = $_POST['statut_compte'];
$historique = $_POST['historique_activite'];
$notification = $_POST['Notifications'];

// Validation des données
if (empty($nom) || empty($prenom) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($mdp) || ($mdp !== $mdp2)) {
    echo "Nom, prénom, email, ou mot de passe invalide.";
    exit;
}

// Préparation de la requête
$stmt = $conn->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role_id, CP, date_creation_compte, statut_compte, historique_activite, Notifications) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssiissss", $nom, $prenom, $email, password_hash($mdp, PASSWORD_DEFAULT), $role, $CP, $date_crea, $statut, $historique, $notification); // Utilisation de password_hash pour sécuriser le mot de passe

// Exécution de la requête
if ($stmt->execute()) {
    echo "Nouveau record créé avec succès";
} else {
    echo "Erreur : " . $stmt->error;
}

// Fermeture des déclarations et de la connexion
$stmt->close();
$conn->close();
?>
