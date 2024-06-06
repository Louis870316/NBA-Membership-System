<?php

class Connector {
    private $host;
    private $db;
    private $user;
    private $pass;
    private $conn;

    public function __construct($host, $db, $user, $pass) {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->pass = $pass;
    }

    public function getConnection() {
        if ($this->conn == null) {
            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
        return $this->conn;
    }
}

