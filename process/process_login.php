<?php
require_once('../function/Connector.php');
require_once('../function/Account.php');
require_once('../function/helper.php');

$host = 'localhost';
$db = 'login';
$user = 'root';
$pass = '';

$connector = new Connector($host, $db, $user, $pass);
$account = new Account($connector);

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    die("Username or password not provided");
}

$userName = trim($_POST['username']);
$password = trim($_POST['password']);

try {
    $user = $account->getUserByUsername($userName);

    if ($user) {
        if (password_verify($password, $user['password'])) {  
            session_start();
            $_SESSION['id'] = $user['id'];
            header("Location: " .  base_url('dashboard.php'));
            exit();
        } else {
            header("Location: " .  base_url('index.php?process=failedlogin'));
            exit();
        }
    } else {
        header("Location: " .  base_url('index.php?process=failedlogin'));
        exit();
    }

} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}