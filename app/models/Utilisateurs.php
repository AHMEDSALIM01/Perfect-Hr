<?php 

abstract class Utilisateurs
{
    protected $db;
   
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getOneByEmail()
    {
        $this->db->query('SELECT * FROM employés WHERE email = :email');
        $this->db->bind(':email', $this->email);
        return $this->db->single();
    }

    public function getOneByRole()
    {
        $this->db->query('SELECT * FROM employés WHERE role = :role');
        $this->db->bind(':role', $this->role);
        return $this->db->single();
    }
    public function update()
    {
        $this->db->query('UPDATE utilisateurs SET nom_complet = :nom_complet, email = :email, role = :role WHERE id = :id');
        $this->db->bind(':id', $this->id);
        $this->db->bind(':nom_complet', $this->nom_complet);
        $this->db->bind(':email', $this->email);
        $this->db->bind(':role', $this->role);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}