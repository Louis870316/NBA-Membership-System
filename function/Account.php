<?php

class Account {
    private $conn;

    public function __construct($connector) {
        $this->conn = $connector->getConnection();
    }

      public function createAccount($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':username' => $username, ':password' => $hashedPassword]);
    }


    public function updateAccount($id, $username, $password) {
        $sql = "UPDATE users SET username = :username, password = :password WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':username' => $username, ':password' => password_hash($password, PASSWORD_DEFAULT), ':id' => $id]);
    }

    public function deleteAccount($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    public function getAccount($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createPlayer($player, $team, $position, $height, $country) {
        $sql = "INSERT INTO nba (player, team, position, height, country) VALUES (:player, :team, :position, :height, :country)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':player' => $player,
            ':team' => $team,
            ':position' => $position,
            ':height' => $height,
            ':country' => $country
        ]);
    }

    public function deletePlayer($id) {
        $sql = "DELETE FROM nba WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    public function updatePlayer($id, $player, $team, $position, $height, $country) {
        $sql = "UPDATE nba SET player = :player, team = :team, position = :position, height = :height, country = :country WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':player' => $player,
            ':team' => $team,
            ':position' => $position,
            ':height' => $height,
            ':country' => $country,
            ':id' => $id
        ]);
    }

    public function getUserByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

