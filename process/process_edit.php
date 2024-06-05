<?php

require_once('../function/helper.php');
require_once('../function/connect.php');

$player = $_POST['player'];
$team = $_POST['team'];
$position = $_POST['position'];
$height = $_POST['height'];
$country = $_POST['country'];
$id = $_POST['id'];

if (empty($player) || empty($team) || empty($position) || empty($height) || empty($country)) {
    header("location: " . BASE_URL . 'dashboard.php?page=edit&id=' . $id . '&emptyform=true');
    exit();
} else {
    try {
        // 使用預處理語句更新數據
        $stmt = $connect->prepare("UPDATE nba SET player = :player, team = :team, position = :position, height = :height, country = :country WHERE id = :id");
        $stmt->execute([
            'player' => $player,
            'team' => $team,
            'position' => $position,
            'height' => $height,
            'country' => $country,
            'id' => $id
        ]);

        header("location: " . BASE_URL . 'dashboard.php?page=home&status=success');
        exit();
    } catch (PDOException $e) {
        die("Update failed: " . $e->getMessage());
    }
}
?>
