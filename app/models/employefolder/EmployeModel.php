<?php
require_once APPROOT.'/models/Utilisateurs.php';
class EmployeModel extends Utilisateurs
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getOneByRole()
    {
        $this->db->query('SELECT * FROM utilisateurs WHERE role = :role');
        $this->db->bind(':role', $this->role);
        return $this->db->single();
    }

    public function getOneById()
    {
        $this->db->query('SELECT * FROM utilisateurs WHERE id = :id');
        $this->db->bind(':id', $this->id);
        return $this->db->single();
    }

    public function getOneByNomComplet()
    {
        $this->db->query('SELECT * FROM comptes WHERE nom_complet = :nom_complet');
        $this->db->bind(':nom_complet', $this->nom_complet);
        return $this->db->single();
    }
    public function getEmployeByEmail($email){
        $sql = "SELECT * FROM employe WHERE email = :email";
        $result = $this->db->query($sql);
        $result = $this->db->bind(':email', $email);
        $result = $this->db->single();
        return $result;
    }
    public function getEmployeByEmailAndPassword($data){
        $sql = "SELECT * FROM employe WHERE email = :email AND password = :password";
        $result = $this->db->query($sql);
        $result= $this->db->bind(':email', $data['email']);
        $result= $this->db->bind(':password', $data['password']);
        $result= $this->db->single();
        return $result;
    }

}