<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST['description'];
    $etat = $_POST['etat'];
    $priorite = $_POST['priorite'];

    $stmt = $pdo->prepare("INSERT INTO tickets (description, etat, priorite) VALUES (?, ?, ?)");
    $stmt->execute([$description, $etat, $priorite]);

    echo "Ticket créé avec succès !";
}
?>
