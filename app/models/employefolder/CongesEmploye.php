<?php 
require_once APPROOT.'/models/Conges.php';
class CongesEmploye extends Conges{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllByIdEmploye($id_employe)
    {
        $results=$this->db->query("SELECT * FROM conge INNER JOIN employe ON employe.id_employe =conge.id_employe WHERE conge.id_employe = :id_employe");
        $results=$this->db->bind(':id_employe', $id_employe);
        $results = $this->db->resultSet();
        return $results;
    }


    public function createConges($data)
    {
        $this->db->query("INSERT INTO conge (id_employe, designation, date_debut, date_fin, durée, statut) VALUES (:id_employe, :designation, :date_debut, :date_fin, :durée, :statut)");
        $this->db->bind(':id_employe', $data['id_employe']);
        $this->db->bind(':designation', $data['designation']);
        $this->db->bind(':date_debut', $data['date_debut']);
        $this->db->bind(':date_fin', $data['date_fin']);
        $this->db->bind(':durée', $data['durée']);
        $this->db->bind(':statut', $data['statut']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateConges($data)
    {
        $this->db->query("UPDATE conge SET designation = :designation, date_debut = :date_debut, date_fin = :date_fin, durée = :durée, statut = :statut WHERE id_employe = :id_employe AND id = :id");
        $this->db->bind(':id_employe', $data['id_employe']);
        $this->db->bind(':designation', $data['designation']);
        $this->db->bind(':date_debut', $data['date_debut']);
        $this->db->bind(':date_fin', $data['date_fin']);
        $this->db->bind(':durée', $data['durée']);
        $this->db->bind(':statut', $data['statut']);
        $this->db->bind(':id', $data['id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteConges($id_employe, $id)
    {
        $this->db->query("DELETE FROM conges WHERE id_employe = :id_employe AND id = :id");
        $this->db->bind(':id_employe', $id_employe);
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}