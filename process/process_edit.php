<?php
require_once('../function/Connector.php');
require_once('../function/Account.php');
require_once('../function/helper.php');

// 用你的MySQL數據庫連接訊息替換
$host = 'localhost';
$db = 'login';
$user = 'root';
$pass = '';

$connector = new Connector($host, $db, $user, $pass);
$account = new Account($connector);

$player = trim($_POST['player']);
$team = trim($_POST['team']);
$position = trim($_POST['position']);
$height = trim($_POST['height']);
$country = trim($_POST['country']);
$id = trim($_POST['id']);

if (empty($player) || empty($team) || empty($position) || empty($height) || empty($country)) {
    header("location: " .  base_url('dashboard.php?page=edit&id=') . $id . '&emptyform=true');
    exit();
}

try {
    $account->updatePlayer($id, $player, $team, $position, $height, $country);
    header("location: " .  base_url('dashboard.php?page=home&status=success'));
    exit();
} catch (PDOException $e) {
    die("Update failed: " . $e->getMessage());
}