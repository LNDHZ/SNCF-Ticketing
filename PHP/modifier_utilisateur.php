<?php
include('connexion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    
    $sql = "SELECT * FROM table_utilisateur WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        
     
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            
            $update_sql = "UPDATE utilisateurs SET nom = '$nom', email = '$email' WHERE id = $id";
            mysqli_query($conn, $update_sql);
            
            echo "L'utilisateur a été mis à jour avec succès.";
        }
    }
}
?>

<!-- Formulaire de modification -->
<form method="POST">
    Nom: <input type="text" name="nom" value="<?php echo $user['nom']; ?>" /><br>
    Email: <input type="text" name="email" value="<?php echo $user['email']; ?>" /><br>
    <!-- Ajouter d'autres champs ici -->
    <input type="submit" value="Mettre à jour">
</form>
