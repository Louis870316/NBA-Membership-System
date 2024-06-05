<?php

require_once('../function/helper.php');
require_once('../function/connect.php');

$player = $_POST['player'];
$team = $_POST['team'];
$position = $_POST['position'];
$height = $_POST['height'];
$country = $_POST['country'];

if (empty($player) || empty($team) || empty($position) || empty($height) || empty($country) ) {
    header("location: " . BASE_URL . 'dashboard.php?page=create&process=failed');
    exit();
} else {
    try {
        // 使用预处理语句插入数据
        $stmt = $connect->prepare("INSERT INTO nba (player, height, country, position, team) VALUES (:player, :height, :country, :height, :team)");
        $stmt->execute([
            'player' => $player,
            'team' => $team,
            'position' => $position,
            'height' => $height,
            'country' => $country
        ]);

        header("location: " . BASE_URL . 'dashboard.php?page=home&process=success');
        exit();
    } catch (PDOException $e) {
        die("插入失败: " . $e->getMessage());
    }
}
?>
