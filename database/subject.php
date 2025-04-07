<?php
require_once 'database.php';

class Subject extends Database {
    private $conn;
    public function __construct() {
        $this->conn = $this->connect();
    }
    public function get_subjects() {
        $sql = "SELECT * FROM subject";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
