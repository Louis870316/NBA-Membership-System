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
            // 检查用户名是否存在
            $stmt = $connect->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->execute(['username' => $userName]);
            if ($stmt->rowCount() != 0) {
                header("location: " . BASE_URL . 'register.php?process=failedusername');
                exit();
            } else {
                // 插入新用户
                $stmt = $connect->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
                $stmt->execute(['username' => $userName, 'password' => $password]);
                header("location: " . BASE_URL . 'index.php?process=successregister');
                exit();
            }
        } catch (PDOException $e) {
            die("数据库操作失败: " . $e->getMessage());
        }
    }
}
?>
