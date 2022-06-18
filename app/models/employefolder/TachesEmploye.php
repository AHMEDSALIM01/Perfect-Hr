<?php 
require_once APPROOT.'/models/Taches.php';
class TachesEmploye extends Taches{
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllByIdEmploye($id_employe)
    {
        $this->db->query("SELECT * FROM taches WHERE id_employe = :id_employe");
        $this->db->bind(':id_employe', $id_employe);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getAllTachesEncoursByIdEmploye($id_employe)
    {
        $sql = "SELECT * FROM taches INNER JOIN employe ON employe.id_employe = taches.id_employe  WHERE taches.id_employe = :id_employe AND taches.status_taches = :status";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':id_employe', $id_employe, PDO::PARAM_STR);
        $result = $this->db->bind(':status', 'en cours', PDO::PARAM_STR);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getAllTachesTermineByIdEmploye($id_employe)
    {
        $sql = "SELECT * FROM taches INNER JOIN employe ON employe.id_employe = taches.id_employe  WHERE taches.id_employe = :id_employe AND taches.status_taches = :status";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':id_employe', $id_employe, PDO::PARAM_STR);
        $result = $this->db->bind(':status', 'termine', PDO::PARAM_STR);
        $result = $this->db->resultSet();
        return $result;
    }

    public function closeTache($id)
    {
        $results = $this->db->query("UPDATE taches SET status_taches=:status, date_achevement =:date_achevement WHERE id_taches = :id");
        $results = $this->db->bind(':status', 'termine');
        $results = $this->db->bind(':date_achevement', date('Y-m-d H:i:s'));
        $results = $this->db->bind(':id', $id);
        $results = $this->db->execute();
        return $results;
    }
    

}