<?php
require_once 'database.php';

class Info extends Database {
    private $conn;
    public function __construct() {
        $this->conn = $this->connect();
    }
    public function get_address_iframe() {
        $sql = "SELECT address_iframe FROM info";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}