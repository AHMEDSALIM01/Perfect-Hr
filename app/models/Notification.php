<?php
class Notification
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getNotificationEmploye($id){
        $this->db->query("SELECT * FROM notification_employe WHERE id_employe=:id ORDER BY date_notification DESC");
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

   public function getNotificationAdmin(){
        $this->db->query("SELECT * FROM notification_admin ORDER BY date DESC");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getCountNoReadAdmin(){
        $this->db->query("SELECT * FROM notification_admin WHERE status=:status");
        $this->db->bind(':status', 'non lus');
        $results = $this->db->resultSet();
        return $this->db->rowCount();
    }

    public function getNotificationByIdAdmin($id){
        $this->db->query("SELECT * FROM notification_admin WHERE id = :id");
        $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }

    public function getNotificationByIdEmploye($id){
        $this->db->query("SELECT * FROM notification_employe WHERE id_notification = :id ");
        $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }

    public function getCountNoReadEmploye($id){
        $this->db->query("SELECT * FROM notification_employe WHERE status = :status AND id_employe = :id");
        $this->db->bind(':status', 'non lus');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $this->db->rowCount();
    }

    public function notificationsReadsAdmin($id){
        $this->db->query("UPDATE notification_admin SET status = :status WHERE id = :id");
        $this->db->bind(':status', 'lus');
        $this->db->bind(':id', $id);
        $results = $this->db->execute();
        return $results;
    }

    public function notificationsReadsEmploye($id){
        $this->db->query("UPDATE notification_employe SET status = :status WHERE id_notification = :id");
        $this->db->bind(':status', 'lus');
        $this->db->bind(':id', $id);
        $results = $this->db->execute();
        return $results;
    }

    public function addNotificationAdmin($data){
        $this->db->query("INSERT INTO notification_admin (id_employe, designation, date, type) VALUES (:id_employe, :designation, :date, :type)");
        $this->db->bind(':id_employe', $data['id_employe']);
        $this->db->bind(':designation', $data['designation']);
        $this->db->bind(':date', date('Y-m-d H:i:s'));
        $this->db->bind(':type', $data['type']);
        $results = $this->db->execute();
        return $results;
    }

    public function addNotificationEmploye($data){
        $this->db->query("INSERT INTO notification_employe (id_employe, designation, date_notification, type) VALUES (:id_employe, :designation, :date, :type)");
        $this->db->bind(':id_employe', $data['id_employe']);
        $this->db->bind(':designation', $data['designation']);
        $this->db->bind(':date', date('Y-m-d H:i:s'));
        $this->db->bind(':type', $data['type']);
        $results = $this->db->execute();
        return $results;
    }
    
}