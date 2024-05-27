<?php

require_once '../config/database.php';
require_once '../src/Auth.php';

$auth = new Auth($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($auth->login($username, $password)) {
        header('Location: dashboard.php');
    } else {
        echo 'Login failed.';
    }
}
include '../templates/header.php';
include '../templates/login_form.php';
include '../templates/footer.php';
?>
