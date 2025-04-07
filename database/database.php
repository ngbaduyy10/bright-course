<?php
class Database {
//    Local database connection
//    private $host = "localhost";
//    private $db_name = "bright_courses";
//    private $username = "root";
//    private $password = "";

    // Remote database connection (JawsDB)
    private $host = "k9xdebw4k3zynl4u.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    private $db_name = "ehwcdzmx1xdvjrdf";
    private $username = "yd4rifp0qm4l4ssc";
    private $password = "d3fbswu7xl5ggcnr";

    public function connect() {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8";
            $conn = new PDO($dsn, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
        return $conn;
    }
}
?>