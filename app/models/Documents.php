<?php
abstract class Documents
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    
}