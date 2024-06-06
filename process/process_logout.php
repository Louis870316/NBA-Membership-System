<?php
require_once('../function/helper.php');
require_once('../function/Connector.php');
require_once('../function/Account.php');

session_start();
unset($_SESSION['id']);

header('location: ' .  base_url());
exit();

