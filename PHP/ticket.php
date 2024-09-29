<?php
// Ticket.php
require_once 'Database.php';

class Ticket {
    private $conn;
    private $table_name = "ticket";

    public $id;
    public $titre;
    public $description;
    public $date_creation;
    public $date_modification;
    public $statut;
    public $priorite;
    public $utilisateur_id;
    public $categorie_id;
    public $date_cloture;
    public $cree_par;
    public $commentaire_resolution;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Créer un nouveau ticket
    public function create(){
        $query = "INSERT INTO " . $this->table_name . " 
                  SET titre_ticket = :titre, description_ticket = :description, 
                      date_creation_ticket = :date_creation, date_modif_ticket = :date_modification, 
                      statut_id = :statut, priorite_id = :priorite, 
                      utilisateur_id = :utilisateur_id, categorie_id = :categorie_id, 
                      date_cloture = :date_cloture, cree_par = :cree_par, 
                      commentaire_resolution = :commentaire_resolution";

        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->titre = htmlspecialchars(strip_tags($this->titre));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->date_creation = htmlspecialchars(strip_tags($this->date_creation));
        $this->date_modification = htmlspecialchars(strip_tags($this->date_modification));
        $this->statut = htmlspecialchars(strip_tags($this->statut));
        $this->priorite = htmlspecialchars(strip_tags($this->priorite));
        $this->utilisateur_id = htmlspecialchars(strip_tags($this->utilisateur_id));
        $this->categorie_id = htmlspecialchars(strip_tags($this->categorie_id));
        $this->date_cloture = htmlspecialchars(strip_tags($this->date_cloture));
        $this->cree_par = htmlspecialchars(strip_tags($this->cree_par));
        $this->commentaire_resolution = htmlspecialchars(strip_tags($this->commentaire_resolution));

        // Bind
        $stmt->bindParam(":titre", $this->titre);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":date_creation", $this->date_creation);
        $stmt->bindParam(":date_modification", $this->date_modification);
        $stmt->bindParam(":statut", $this->statut);
        $stmt->bindParam(":priorite", $this->priorite);
        $stmt->bindParam(":utilisateur_id", $this->utilisateur_id);
        $stmt->bindParam(":categorie_id", $this->categorie_id);
        $stmt->bindParam(":date_cloture", $this->date_cloture);
        $stmt->bindParam(":cree_par", $this->cree_par);
        $stmt->bindParam(":commentaire_resolution", $this->commentaire_resolution);

        if($stmt->execute()){
            return true;
        }

        return false;
    }

    // Lire tous les tickets
    public function readAll(){
        $query = "SELECT t.id, t.titre_ticket, t.description_ticket, t.date_creation_ticket, 
                         t.date_modif_ticket, u.nom as utilisateur, c.nom as categorie, 
                         s.nom as statut, p.nom as priorite, t.date_cloture, 
                         t.cree_par, t.commentaire_resolution 
                  FROM " . $this->table_name . " t
                  LEFT JOIN utilisateur u ON t.utilisateur_id = u.id
                  LEFT JOIN categorie c ON t.categorie_id = c.id
                  LEFT JOIN statut s ON t.statut_id = s.id
                  LEFT JOIN priorite p ON t.priorite_id = p.id
                  ORDER BY t.date_creation_ticket DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Lire un ticket par ID
    public function readOne(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){
            $this->titre = $row['titre_ticket'];
            $this->description = $row['description_ticket'];
            $this->date_creation = $row['date_creation_ticket'];
            $this->date_modification = $row['date_modif_ticket'];
            $this->statut = $row['statut_id'];
            $this->priorite = $row['priorite_id'];
            $this->utilisateur_id = $row['utilisateur_id'];
            $this->categorie_id = $row['categorie_id'];
            $this->date_cloture = $row['date_cloture'];
            $this->cree_par = $row['cree_par'];
            $this->commentaire_resolution = $row['commentaire_resolution'];
            return true;
        }

        return false;
    }

    // Mettre à jour un ticket
    public function update(){
        $query = "UPDATE " . $this->table_name . " 
                  SET titre_ticket = :titre, description_ticket = :description, 
                      date_modif_ticket = :date_modification, statut_id = :statut, 
                      priorite_id = :priorite, utilisateur_id = :utilisateur_id, 
                      categorie_id = :categorie_id, date_cloture = :date_cloture, 
                      cree_par = :cree_par, commentaire_resolution = :commentaire_resolution 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->titre = htmlspecialchars(strip_tags($this->titre));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->date_modification = htmlspecialchars(strip_tags($this->date_modification));
        $this->statut = htmlspecialchars(strip_tags($this->statut));
        $this->priorite = htmlspecialchars(strip_tags($this->priorite));
        $this->utilisateur_id = htmlspecialchars(strip_tags($this->utilisateur_id));
        $this->categorie_id = htmlspecialchars(strip_tags($this->categorie_id));
        $this->date_cloture = htmlspecialchars(strip_tags($this->date_cloture));
        $this->cree_par = htmlspecialchars(strip_tags($this->cree_par));
        $this->commentaire_resolution = htmlspecialchars(strip_tags($this->commentaire_resolution));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind
        $stmt->bindParam(":titre", $this->titre);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":date_modification", $this->date_modification);
        $stmt->bindParam(":statut", $this->statut);
        $stmt->bindParam(":priorite", $this->priorite);
        $stmt->bindParam(":utilisateur_id", $this->utilisateur_id);
        $stmt->bindParam(":categorie_id", $this->categorie_id);
        $stmt->bindParam(":date_cloture", $this->date_cloture);
        $stmt->bindParam(":cree_par", $this->cree_par);
        $stmt->bindParam(":commentaire_resolution", $this->commentaire_resolution);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()){
            return true;
        }

        return false;
    }

    // Supprimer un ticket
    public function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind
        $stmt->bindParam(1, $this->id);

        if($stmt->execute()){
            return true;
        }

        return false;
    }
}
?>
