<?php
require_once 'database.php';
class User extends Database {
    private $conn;
    public function __construct() {
        $this->conn = $this->connect();
    }

    public function get_users() {
        $sql = "SELECT * FROM user";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}