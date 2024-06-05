<?php

require_once('../function/helper.php');
require_once('../function/connect.php');

$id = $_GET['id'];

try {
    // 使用预处理语句删除数据
    $stmt = $connect->prepare("DELETE FROM nba WHERE id = :id");
    $stmt->execute(['id' => $id]);

    header("location: " . BASE_URL . 'dashboard.php?page=home&status=success');
    exit();
} catch (PDOException $e) {
    die("删除失败: " . $e->getMessage());
}
?>
