<?php

require_once('../function/helper.php');
require_once('../function/connect.php');

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    die("用户名或密码未提供");
}

$userName = $_POST['username'];
$password = md5($_POST['password']);

try {
    // 使用预处理语句防止 SQL 注入
    $stmt = $connect->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->execute(['username' => $userName, 'password' => $password]);

    if ($stmt->rowCount() != 0) {
        $rows = $stmt->fetch();

        // 启动 session
        session_start();
        $_SESSION['id'] = $rows['id'];
        header("Location: " . BASE_URL . 'dashboard.php');
    } else {
        header("Location: " . BASE_URL);
    }

} catch (PDOException $e) {
    die("查询失败: " . $e->getMessage());
}
?>
