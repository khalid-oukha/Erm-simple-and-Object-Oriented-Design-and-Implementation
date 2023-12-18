<?php
require 'config.php';
class Database {
    private $conn;
    public function __construct($host, $username, $password, $dbname) {
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    public function getConnection():PDO {
        return $this->conn;
    }

}
