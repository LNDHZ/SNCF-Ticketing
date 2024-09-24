<?php
include('db_connection.php');

$id = $_GET['id'];
$sql = "SELECT * FROM table_tickets WHERE id = $id";
$result = $conn->query($sql);
$ticket = $result->fetch_assoc();

// Insérer une nouvelle entrée dans la base de données
$insert_sql = "INSERT INTO table_tickets (titre_ticket, description_ticket, date_creation_ticket, utilisateur_id, categorie_id, statut_id, priorite_id) VALUES ('".$ticket['titre_ticket']."', '".$ticket['description_ticket']."', NOW(), '".$ticket['utilisateur_id']."', '".$ticket['categorie_id']."', '".$ticket['statut_id']."', '".$ticket['priorite_id']."')";
$conn->query($insert_sql);

header("Location: gestion_tickets.php");
?>
