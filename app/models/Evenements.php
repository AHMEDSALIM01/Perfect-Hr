<?php
abstract class Evenements
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getAll(){
        $this->db->query("SELECT * FROM evenement ");
        $results = $this->db->resultSet();
        return $results;
    }
}