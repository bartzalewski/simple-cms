<?php
require_once '../src/Auth.php';

$auth = new Auth($pdo);
$auth->logout();

header('Location: login.php');
?>
