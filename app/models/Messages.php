<?php
class Messages
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getMessages()
    {
        $results = $this->db->query('SELECT * FROM messages');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getMessageEmploye($id)
    {
        $results = $this->db->query('SELECT * FROM messages INNER JOIN employe ON messages.id_employe = employe.id_employe WHERE messages.id_message = :id');
        $results = $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }

    public function getMessageAdmin($id)
    {
        $results = $this->db->query('SELECT * FROM messages INNER JOIN admin ON messages.id_admin = admin.id_admin  WHERE messages.id_message = :id');
        $results = $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }

    public function getAllMessagesEmploye()
    {
        $results=$this->db->query('SELECT * FROM messages INNER JOIN employe ON messages.id_employe = employe.id_employe WHERE messages.message_employe != ""');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getMessagesAdminByIdEmploye($id)
    {
        $results=$this->db->query("SELECT * FROM messages INNER JOIN admin ON messages.id_admin = admin.id_admin WHERE messages.message_admin != '' AND messages.id_employe=:id");
        $results=$this->db->bind(':id',$id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function deletMessage($id)
    {
        $results = $this->db->query('DELETE FROM messages WHERE id_message = :id');
        $results = $this->db->bind(':id', $id);
        $results = $this->db->execute();
        return $results;
    }

    public function addMessage($data)
    {
        $results = $this->db->query('INSERT INTO messages (id_employe, id_admin,objet, message_admin,date_admin) VALUES (:id_employe, :id_admin, :objet, :message, :date)');
        $results = $this->db->bind(':id_employe', $data['id_employe']);
        $results = $this->db->bind(':id_admin', $data['id_admin']);
        $results = $this->db->bind(':objet', $data['objet']);
        $results = $this->db->bind(':message', $data['message']);
        $results = $this->db->bind(':date', $data['date_admin']);
        $results = $this->db->execute();
        return $results;
    }

    public function addMessageEmploye($data)
    {
        $results = $this->db->query('INSERT INTO messages (id_employe, id_admin,objet, message_employe,date_employe) VALUES (:id_employe, :id_admin, :objet, :message, :date)');
        $results = $this->db->bind(':id_employe', $data['id_employe']);
        $results = $this->db->bind(':id_admin', $data['id_admin']);
        $results = $this->db->bind(':objet', $data['objet']);
        $results = $this->db->bind(':message', $data['message']);
        $results = $this->db->bind(':date', $data['date_employe']);
        $results = $this->db->execute();
        return $results;
    }

    public function messageReads($id)
    {
        $results = $this->db->query('UPDATE messages SET status_message = :status WHERE id_message = :id');
        $results = $this->db->bind(':id', $id);
        $results = $this->db->bind(':status', 'lus');
        $results = $this->db->execute();
        return $results;
    }

    public function getCountNotRead(){
        $this->db->query("SELECT * FROM messages WHERE status_message = :status AND message_employe != ''");
        $this->db->bind(':status', 'non lus');
        $results = $this->db->resultSet();
        return $this->db->rowCount();
    }

    public function getCountNotReadByIdEmploye($id){
        $this->db->query("SELECT * FROM messages WHERE status_message = :status AND message_admin != '' AND messages.id_employe=:id");
        $this->db->bind(':id', $id);
        $this->db->bind(':status', 'non lus');
        $results = $this->db->resultSet();
        return $this->db->rowCount();
    }
}