<?php 
require_once APPROOT.'/models/Utilisateurs.php';
class AdminModel extends Utilisateurs{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAllEmployeLimit($startLimit,$endLimit){
        $sql = "SELECT * FROM employe ORDER BY id_employe ASC LIMIT :startLimit,:endLimit";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':startLimit', $startLimit);
        $result = $this->db->bind(':endLimit', $endLimit);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getAllEmploye(){
        $sql = "SELECT * FROM employe";
        $result = $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }
    
    public function getEmployeById($id){
        $sql = "SELECT * FROM employe WHERE id_employe = :id";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }

    public function getAccountByEmail($email){
        $sql = "SELECT * FROM admin WHERE email = :email";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':email', $email);
        $result = $this->db->single();
        $account = $result;
        return $account;
    }

    
    public function getAccountByEmailAndPassword($data){
        $sql = "SELECT * FROM admin WHERE email = :email AND password = :password";
        $result = $this->db->query($sql);
        $result= $this->db->bind(':email', $data['email']);
        $result= $this->db->bind(':password', $data['password']);
        $result= $this->db->single();
        return $result;
    }


    public function createEmploye($data){
        $sql = "INSERT INTO employe (nom_complet, cin, date_naissance, lieu_naissance, email,telephone,adress, role, date_embauche, n_cnss, compte_bancaire,banque,image) VALUES (:nom_complet, :cin, :date_naissance, :lieu_naissance, :email,:telephone,:adress, :role, :date_embauche, :n_cnss, :compte_bancaire,:banque,:image)";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':nom_complet', $data['nom_complet'], PDO::PARAM_STR);
        $result = $this->db->bind(':cin', $data['cin'], PDO::PARAM_STR);
        $result = $this->db->bind(':date_naissance', $data['date_naissance'], PDO::PARAM_STR);
        $result = $this->db->bind(':lieu_naissance', $data['lieu_naissance'], PDO::PARAM_STR);
        $result = $this->db->bind(':email', $data['email'], PDO::PARAM_STR);
        $result = $this->db->bind(':telephone', $data['telephone'], PDO::PARAM_STR);
        $result = $this->db->bind(':adress', $data['adress'], PDO::PARAM_STR);
        $result = $this->db->bind(':role', $data['role'], PDO::PARAM_STR);
        $result = $this->db->bind(':date_embauche', $data['date_embauche'], PDO::PARAM_STR);
        $result = $this->db->bind(':n_cnss', $data['n_cnss'], PDO::PARAM_STR);
        $result = $this->db->bind(':compte_bancaire', $data['compte_bancaire'], PDO::PARAM_STR);
        $result = $this->db->bind(':banque', $data['banque'], PDO::PARAM_STR);
        $result = $this->db->bind(':image', $data['image'], PDO::PARAM_STR);
        $result = $this->db->execute();
        return $result;
    }

    public function updateEmploye($data){
        $sql = "UPDATE employe SET nom_complet = :nom_complet, cin = :cin, date_naissance = :date_naissance, lieu_naissance = :lieu_naissance, email = :email, telephone = :telephone, adress = :adress, role = :role, date_embauche = :date_embauche, n_cnss = :n_cnss, compte_bancaire = :compte_bancaire, banque = :banque, image=:image  WHERE id_employe = :id";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':id', $data['id'], PDO::PARAM_INT);
        $result = $this->db->bind(':nom_complet', $data['nom_complet'], PDO::PARAM_STR);
        $result = $this->db->bind(':cin', $data['cin'], PDO::PARAM_STR);
        $result = $this->db->bind(':date_naissance', $data['date_naissance'], PDO::PARAM_STR);
        $result = $this->db->bind(':lieu_naissance', $data['lieu_naissance'], PDO::PARAM_STR);
        $result = $this->db->bind(':email', $data['email'], PDO::PARAM_STR);
        $result = $this->db->bind(':telephone', $data['telephone'], PDO::PARAM_STR);
        $result = $this->db->bind(':adress', $data['adress'], PDO::PARAM_STR);
        $result = $this->db->bind(':role', $data['role'], PDO::PARAM_STR);
        $result = $this->db->bind(':date_embauche', $data['date_embauche'], PDO::PARAM_STR);
        $result = $this->db->bind(':n_cnss', $data['n_cnss'], PDO::PARAM_STR);
        $result = $this->db->bind(':compte_bancaire', $data['compte_bancaire'], PDO::PARAM_STR);
        $result = $this->db->bind(':banque', $data['banque'], PDO::PARAM_STR);
        $result = $this->db->bind(':image', $data['image'], PDO::PARAM_STR);
        $result = $this->db->execute();
        return $result;
    }

    public function deleteEmploye($id){
        $sql = "DELETE FROM employe WHERE id_employe = :id";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':id', $id, PDO::PARAM_INT);
        $result = $this->db->execute();
        return $result;
    }

    public function createAccount($data){
        $sql = "UPDATE employe SET status = :status, password = :password WHERE email = :email AND id_employe = :id";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':email', $data['email'], PDO::PARAM_STR);
        $result = $this->db->bind(':password', md5($data['password_without_hash']), PDO::PARAM_STR);
        $result = $this->db->bind(':status', 'active', PDO::PARAM_STR);
        $result = $this->db->bind(':id', $data['id'], PDO::PARAM_INT);
        $result = $this->db->execute();
        return $result;
    }

    public function deactiveAccount($id){
        $sql = "UPDATE employe SET status = :status WHERE id_employe = :id";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':status', 'desactive', PDO::PARAM_STR);
        $result = $this->db->bind(':id', $id, PDO::PARAM_INT);
        $result = $this->db->execute();
        return $result;
    }
    
    public function reactiveAccount($data){
        $sql = "UPDATE employe SET status = :status WHERE id_employe = :id AND email = :email";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':status', 'active', PDO::PARAM_STR);
        $result = $this->db->bind(':id', $data['id'], PDO::PARAM_INT);
        $result = $this->db->bind(':email', $data['email'], PDO::PARAM_STR);
        $result = $this->db->execute();
        return $result;
    }

    public function getCountEmploye(){
        $sql = "SELECT COUNT(*) AS total FROM employe";
        $result = $this->db->query($sql);
        $result = $this->db->single();
        return $result;
    }

    public function assignTache($data){
        $sql = "INSERT INTO taches (id_employe, designation, status, durée) VALUES (:id_employe, :designation, :status, :duree)";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':id_employe', $data['id_employe'], PDO::PARAM_INT);
        $result = $this->db->bind(':designation', $data['designation'], PDO::PARAM_STR);
        $result = $this->db->bind(':status', $data['status'], PDO::PARAM_STR);
        $result = $this->db->bind(':duree', $data['duree'], PDO::PARAM_STR);
        $result = $this->db->execute();
        return $result;
    }

    public function getAllEmployeActive(){
        $sql = "SELECT * FROM employe WHERE status = :status";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':status', 'active', PDO::PARAM_STR);
        $result = $this->db->resultSet();
        return $result;
    }
    
    public function updatePasswordFirstLogin($data){
        $sql = "UPDATE employe SET password = :password, count= :count WHERE id_employe = :id";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':password', $data['password_confirm'], PDO::PARAM_STR);
        $result = $this->db->bind(':count','1', PDO::PARAM_INT);
        $result = $this->db->bind(':id', $data['id'], PDO::PARAM_INT);
        $result = $this->db->execute();
        return $result;
    }

    public function getAdmin(){
        $sql = "SELECT * FROM admin ";
        $result = $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }
    

}