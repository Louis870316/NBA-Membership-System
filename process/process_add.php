<?php
require_once('../function/Connector.php');
require_once('../function/helper.php');

// 用你的MySQL數據庫連接訊息替換
$host = 'localhost';
$db = 'login';
$user = 'root';
$pass = '';

$connector = new Connector($host, $db, $user, $pass);
$conn = $connector->getConnection();

$player = $_POST['player'];
$team = $_POST['team'];
$position = $_POST['position'];
$height = $_POST['height'];
$country = $_POST['country'];

if (empty($player) || empty($team) || empty($position) || empty($height) || empty($country)) {
    header("location: " .  base_url('dashboard.php?page=create&process=failed'));
    exit();
} else {
    try {
        // 使用預處理語句插入數據
        $stmt = $conn->prepare("INSERT INTO nba (player, team, position, height, country) VALUES (:player, :team, :position, :height, :country)");
        $stmt->execute([
            'player' => $player,
            'team' => $team,
            'position' => $position,
            'height' => $height,
            'country' => $country
        ]);

        header("location: " .  base_url('dashboard.php?page=home&process=success'));
        exit();
    } catch (PDOException $e) {
        die("Insertion failed: " . $e->getMessage());
    }
}

