<?php

require_once('../function/helper.php');
require_once('../function/connect.php');

$userName = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

if (empty($userName) || empty($password) || empty($repassword)) {
    header("location: " . BASE_URL . 'register.php?process=failedempty');
    exit();
} else {
    if ($password != $repassword) {
        header("location: " . BASE_URL . 'register.php?process=failedpassword');
        exit();
    } else {
        try {
            // 檢查用戶名是否存在
            $stmt = $connect->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->execute(['username' => $userName]);
            if ($stmt->rowCount() != 0) {
                header("location: " . BASE_URL . 'register.php?process=failedusername');
                exit();
            } else {
                // 使用 password_hash 函數加密密碼
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // 插入新用戶
                $stmt = $connect->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
                $stmt->execute(['username' => $userName, 'password' => $hashedPassword]);
                header("location: " . BASE_URL . 'index.php?process=successregister');
                exit();
            }
        } catch (PDOException $e) {
            die("數據庫操作失敗: " . $e->getMessage());
        }
    }
}
?>
