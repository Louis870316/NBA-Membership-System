<?php
// connect.php

$server = "localhost";
$userName = "root";
$password = "";
$dbName = "login";

try {
    // 創建 PDO 連接
    $dsn = "mysql:host=$server;dbname=$dbName";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // 啟用異常模式
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // 設置默認的獲取模式
    ];

    $connect = new PDO($dsn, $userName, $password, $options);
    // echo "連接成功"; // 連接成功的消息可以去掉以防止在實際環境中洩漏訊息
} catch (PDOException $e) {
    die("連接失敗: " . $e->getMessage());
}
?>
