<?php
// Utilisateur.php
require_once 'Database.php';

class Utilisateur {
    private $conn;
    private $table_name = "table_utilisateur";

    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $mot_de_passe;
    public $role_id;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Créer un nouvel utilisateur
    public function create(){
        $query = "INSERT INTO " . $this->table_name . " 
                  SET nom = :nom, prenom = :prenom, email = :email, 
                      mot_de_passe = :mot_de_passe, role_id = :role_id";

        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->nom = htmlspecialchars(strip_tags($this->nom));
        $this->prenom = htmlspecialchars(strip_tags($this->prenom));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->mot_de_passe = password_hash($this->mot_de_passe, PASSWORD_BCRYPT);
        $this->role_id = htmlspecialchars(strip_tags($this->role_id));

        // Bind
        $stmt->bindParam(":nom", $this->nom);
        $stmt->bindParam(":prenom", $this->prenom);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":mot_de_passe", $this->mot_de_passe);
        $stmt->bindParam(":role_id", $this->role_id);

        if($stmt->execute()){
            return true;
        }

        return false;
    }

    // Lire tous les utilisateurs
    public function readAll(){
        $query = "SELECT u.id, u.nom, u.prenom, u.email, r.nom as role 
                  FROM " . $this->table_name . " u
                  LEFT JOIN role r ON u.role_id = r.id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Lire un utilisateur par ID
    public function readOne(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){
            $this->nom = $row['nom'];
            $this->prenom = $row['prenom'];
            $this->email = $row['email'];
            $this->mot_de_passe = $row['mot_de_passe'];
            $this->role_id = $row['role_id'];
            return true;
        }

        return false;
    }

    // Mettre à jour un utilisateur
    public function update(){
        $query = "UPDATE " . $this->table_name . " 
                  SET nom = :nom, prenom = :prenom, email = :email, 
                      mot_de_passe = :mot_de_passe, role_id = :role_id 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->nom = htmlspecialchars(strip_tags($this->nom));
        $this->prenom = htmlspecialchars(strip_tags($this->prenom));
        $this->email = htmlspecialchars(strip_tags($this->email));
        if(!empty($this->mot_de_passe)){
            $this->mot_de_passe = password_hash($this->mot_de_passe, PASSWORD_BCRYPT);
        }
        $this->role_id = htmlspecialchars(strip_tags($this->role_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind
        $stmt->bindParam(":nom", $this->nom);
        $stmt->bindParam(":prenom", $this->prenom);
        $stmt->bindParam(":email", $this->email);
        if(!empty($this->mot_de_passe)){
            $stmt->bindParam(":mot_de_passe", $this->mot_de_passe);
        }
        $stmt->bindParam(":role_id", $this->role_id);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()){
            return true;
        }

        return false;
    }

    // Supprimer un utilisateur
    public function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);

       
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if($stmt->execute()){
            return true;
        }

        return false;
    }
}
?>
