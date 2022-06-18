<?php
require_once APPROOT.'/models/Conges.php';
class CongesAdmin extends Conges
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAll(){
        $this->db->query("SELECT * FROM conge INNER JOIN employe ON employe.id_employe =conge.id_employe");
        $results = $this->db->resultSet();
        return $results;
    }

    public function accepteConges($id){
        $results = $this->db->query("UPDATE conge SET status_conge = :status WHERE id_conge = :id");
        $results = $this->db->bind(':status', 'accepté');
        $results = $this->db->bind(':id', $id);
        $results = $this->db->execute();
        return $results;
    }

    public function getCongeByIdAndIdEmploye($id){
        $results =$this->db->query("SELECT * FROM conge INNER JOIN employe ON employe.id_employe = conge.id_employe WHERE conge.id_conge=:id");
        $results = $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }

    public function refuseConges($id){
        $results = $this->db->query("UPDATE conge SET status_conge = :status WHERE id_conge = :id");
        $results = $this->db->bind(':status', 'refusé');
        $results = $this->db->bind(':id', $id);
        $results = $this->db->execute();
        return $results;
    }

    public function getCongesById($id_conges){
        $this->db->query("SELECT * FROM ".$this->table." WHERE id = :id");
        $this->db->bind(':id', $id_conges);
        $row = $this->db->single();
        return $row;
    }
}