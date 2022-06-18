<?php
abstract class Taches
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getIdEmploye()
    {
        return $this->id_employe;
    }

    public function getDesignation()
    {
        return $this->designation;
    }

    public function getDateAssignation()
    {
        return $this->date_assignation;
    }

    public function getDateAchevement()
    {
        return $this->date_achevement;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setIdEmploye($id_employe)
    {
        $this->id_employe = $id_employe;
    }
    
    public function setDesignation($designation)
    {
        $this->designation = $designation;
    }

    public function setDateAssignation($date_assignation)
    {
        $this->date_assignation = $date_assignation;
    }

    public function setDateAchevement($date_achevement)
    {
        $this->date_achevement = $date_achevement;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

}