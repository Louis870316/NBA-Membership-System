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

if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['repassword'])) {
    die("Username or password not provided");
}

$userName = trim($_POST['username']);
$password = trim($_POST['password']);
$repassword = trim($_POST['repassword']);

if ($password !== $repassword) {
    header("Location: " .  base_url('register.php?process=failedpassword'));
    exit();
}

try {
    $existingUser = $account->getUserByUsername($userName);

    if ($existingUser) {
        header("Location: " .  base_url('register.php?process=failedusername'));
        exit();
    } else {
        $account->createAccount($userName, $password); 
        header("Location: " .  base_url('index.php?process=successregister'));
        exit();
    }

} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}

