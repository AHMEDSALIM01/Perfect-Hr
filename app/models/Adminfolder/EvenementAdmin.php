<?php
require_once APPROOT.'/models/Evenements.php';
class EvenementAdmin extends Evenements
{
    public function __construct()
    {
        parent::__construct();
    }

    public function createEvenement($data){
        $result = $this->db->query("INSERT INTO evenement (designation, date_evenement, lieu_evenement) VALUES (:designation, :date_evenement, :lieu_evenement)");
        $result = $this->db->bind(':designation', $data['designation'], PDO::PARAM_STR);
        $result = $this->db->bind(':date_evenement', $data['date_evenement'], PDO::PARAM_STR);
        $result = $this->db->bind(':lieu_evenement', $data['lieu_evenement'], PDO::PARAM_STR);
        $result = $this->db->execute();
        return $result; 
    }

    public function closeEvent($id){
        $result = $this->db->query("UPDATE evenement SET status = :status WHERE id = :id");
        $result = $this->db->bind(':status', 'passe');
        $result = $this->db->bind(':id', $id);
        $result = $this->db->execute();
        return $result;
        
    }

    public function updateEvenement($data){
        $result = $this->db->query("UPDATE evenement SET designation = :designation, date_evenement = :date_evenement, lieu_evenement = :lieu_evenement WHERE id = :id");
        $result = $this->db->bind(':designation', $data['designation'], PDO::PARAM_STR);
        $result = $this->db->bind(':date_evenement', $data['date_evenement'], PDO::PARAM_STR);
        $result = $this->db->bind(':lieu_evenement', $data['lieu_evenement'], PDO::PARAM_STR);
        $result = $this->db->bind(':id', $data['id']);
        $result = $this->db->execute();
        return $result; 
    }

    public function deleteEvenement($id){
        $result = $this->db->query("DELETE FROM evenement WHERE id = :id");
        $result = $this->db->bind(':id', $id);
        $result = $this->db->execute();
        return $result; 
    }

    public function getEvenementById($id){
        $result = $this->db->query("SELECT * FROM evenement WHERE id = :id");
        $result = $this->db->bind(':id', $id);
        $result = $this->db->execute();
        $result = $this->db->single();
        return $result; 
    }
    

}