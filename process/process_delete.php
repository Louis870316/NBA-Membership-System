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

$id = $_GET['id'];

try {
    // 使用 Account 類別刪除數據
    $account->deletePlayer($id);
    header("location: " .  base_url('dashboard.php?page=home&status=success'));
    exit();
} catch (PDOException $e) {
    die("failed to delete: " . $e->getMessage());
}