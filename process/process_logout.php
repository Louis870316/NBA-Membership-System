<?php

require_once('../function/helper.php');
require_once('../function/connect.php');

session_start();
unset($_SESSION['id']);

header('location: ' . BASE_URL);