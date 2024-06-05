<?php

require_once('../function/helper.php');
require_once('../function/connect.php');

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    die("Username or password not provided");
}

$userName = $_POST['username'];
$password = $_POST['password'];

try {
    // 使用預處理語句防止 SQL 注入
    $stmt = $connect->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $userName]);

    if ($stmt->rowCount() != 0) {
        $rows = $stmt->fetch();

        // 驗證密碼
        if (password_verify($password, $rows['password'])) {
            // 啟動 session
            session_start();
            $_SESSION['id'] = $rows['id'];
            header("Location: " . BASE_URL . 'dashboard.php');
            exit();
        } else {
            // 密碼錯誤
            header("Location: " . BASE_URL . 'index.php?process=failedlogin');
            exit();
        }
    } else {
        // 用戶名錯誤
        header("Location: " . BASE_URL . 'index.php?process=failedlogin');
        exit();
    }

} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>
