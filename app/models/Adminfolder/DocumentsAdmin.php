<?php
require_once APPROOT.'/models/Documents.php';
class DocumentsAdmin extends Documents
{
    public function __construct()
    {
        parent::__construct();
    }
    public function createAT($data){
        $results = $this->db->query("INSERT INTO documents (id_employe,nom_complet_employe,n_cnss,fonction,salaire_employe,type_document,date_operation,lieu) VALUES (:id_employe,:nom_complet_employe,:n_cnss,:fonction,:salaire_employe,:type_document,:date_operation,:lieu)");
        $results = $this->db->bind(':id_employe', $data['id_employe']);
        $results = $this->db->bind(':nom_complet_employe', $data['nom_complet']);
        $results = $this->db->bind(':n_cnss', $data['n_cnss']);
        $results = $this->db->bind(':fonction', $data['fonction']);
        $results = $this->db->bind(':salaire_employe', $data['salaire']);
        $results = $this->db->bind(':type_document', $data['type']);
        $results = $this->db->bind(':date_operation', $data['date_operation']);
        $results = $this->db->bind(':lieu', $data['lieu']);
        $results = $this->db->execute();
        return $results;
    }

    public function getAttestations(){
        $results = $this->db->query("SELECT * FROM documents");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getAttestationById($id){
        $sql = "SELECT * FROM documents INNER JOIN employe ON documents.id_employe = employe.id_employe WHERE documents.id_document=:id_document";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':id_document', $id);
        $result = $this->db->single();
        return $result;
    }

    public function getAttestationByIdEmploye($id){
        $results = $this->db->query("SELECT * FROM documents INNER JOIN employe ON documents.id_employe = employe.id_employe WHERE documents.id_employe = :id");
        $results = $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getAllJustifications(){
        $results = $this->db->query("SELECT * FROM justif_absence");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getLienJustification($id){
        $results = $this->db->query("SELECT fichier_ci_joint FROM justif_absence WHERE id_justif = :id");
        $results = $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }
    
}