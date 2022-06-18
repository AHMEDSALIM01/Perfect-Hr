<?php 
class DocumentsEmploye extends Documents{
    private $message_admin;
    private $message_employe;
    
    public function createDemande(){
        $this->db->query("INSERT INTO ".$this->table." (id_employe, designation, date_creation, statut) VALUES (:id_employe, :designation, NOW(), 'en attente')");
        $this->db->bind(':id_employe', $this->id_employe);
        $this->db->bind(':designation', $this->designation);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    
    }

    public function getAllByIdEmploye($id_employe){
        $this->db->query("SELECT * FROM ".$this->table." WHERE id_employe = :id_employe");
        $this->db->bind(':id_employe', $id_employe);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getAllByIdEmployeAndId($id_employe, $id){
        $this->db->query("SELECT * FROM ".$this->table." WHERE id_employe = :id_employe AND id = :id");
        $this->db->bind(':id_employe', $id_employe);
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getAllByStatut($statut){
        $this->db->query("SELECT * FROM ".$this->table." WHERE statut = :statut");
        $this->db->bind(':statut', $statut);
        $results = $this->db->resultSet();
        return $results;
    }

    public function createJustif(){
        $this->db->query("INSERT INTO ".$this->table." (id_employe, designation, date_creation, statut) VALUES (:id_employe, :designation, NOW(), 'en attente')");
        $this->db->bind(':id_employe', $this->id_employe);
        $this->db->bind(':designation', $this->designation);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}