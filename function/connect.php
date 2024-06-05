<?php
// connect.php

$server = "localhost";
$userName = "root";
$password = "";
$dbName = "login";

try {
    // 创建 PDO 连接
    $dsn = "mysql:host=$server;dbname=$dbName";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // 启用异常模式
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // 设置默认的获取模式
    ];

    $connect = new PDO($dsn, $userName, $password, $options);
    // echo "连接成功"; // 连接成功的消息可以去掉以防止在实际环境中泄漏信息
} catch (PDOException $e) {
    die("连接失败: " . $e->getMessage());
}
?>
