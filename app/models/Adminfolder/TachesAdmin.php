<?php
require_once APPROOT.'/models/Taches.php';
class TachesAdmin extends Taches
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(){
        $this->db->query("SELECT * FROM ".$this->table);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getTacheById($id){
        $this->db->query("SELECT * FROM taches INNER JOIN employe ON taches.id_employe= employe.id_employe WHERE taches.id_taches = :id");
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }

    public function createTache($data){
        $results = $this->db->query("INSERT INTO  taches (id_employe, designation,duree) VALUES (:id_employe, :designation,:duree)");
        $results = $this->db->bind(':id_employe', $data['id_employe'], PDO::PARAM_STR);
        $results = $this->db->bind(':designation', $data['designation'], PDO::PARAM_STR);
        $results = $this->db->bind(':duree', $data['duree'], PDO::PARAM_STR);
        $results = $this->db->execute();
        return $results;
        }

    public function updateTache($data){
        $results = $this->db->query("UPDATE taches SET designation = :designation, duree = :duree WHERE id_taches = :id");
        $results = $this->db->bind(':designation', $data['designation'], PDO::PARAM_STR);
        $results = $this->db->bind(':duree', $data['duree'], PDO::PARAM_STR);
        $results = $this->db->bind(':id', $data['id_tache'], PDO::PARAM_INT);
        $results = $this->db->execute();
        return $results;
    }

    public function deleteTache($id){
        $results = $this->db->query("DELETE FROM taches WHERE id_taches = :id");
        $results = $this->db->bind(':id', $id, PDO::PARAM_INT);
        $results = $this->db->execute();
        return $results;
    }

    public function getAllTachesEncours(){
        $sql = "SELECT * FROM taches INNER JOIN employe ON taches.id_employe= employe.id_employe WHERE taches.status_taches = :status";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':status', 'en cours', PDO::PARAM_STR);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getAllTachesTermine(){
        $sql = "SELECT * FROM taches INNER JOIN employe ON taches.id_employe= employe.id_employe WHERE taches.status_taches = :status";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':status', 'termine', PDO::PARAM_STR);
        $result = $this->db->resultSet();
        return $result;
    }

}