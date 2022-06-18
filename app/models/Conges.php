<?php 

abstract class Conges
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    
        
}
