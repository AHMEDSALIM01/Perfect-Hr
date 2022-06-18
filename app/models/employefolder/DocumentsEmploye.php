<?php 
require_once APPROOT.'/models/Documents.php';
class DocumentsEmploye extends Documents{
    
    public function __construct(){
        parent::__construct();
    }

    public function sendJustif($data){
        $results = $this->db->query("INSERT INTO justif_absence (id_employe,nom_complet_employe,designation,fichier_ci_joint) VALUES (:id_employe,:nom_complet_employe,:designation,:file)");
        $results = $this->db->bind(':id_employe', $data['id_employe']);
        $results = $this->db->bind(':nom_complet_employe', $data['nom_complet_employe']);
        $results = $this->db->bind(':designation', $data['designation']);
        $results = $this->db->bind(':file', $data['file']);
        $results = $this->db->execute();
        return $results;

    }
    
}