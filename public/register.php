<?php

require_once '../config/database.php';
require_once '../src/Auth.php';

$auth = new Auth($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($auth->register($username, $password)) {
        header('Location: login.php');
    } else {
        echo 'Registration failed.';
    }
}
include '../templates/header.php';
include '../templates/register_form.php';
include '../templates/footer.php';
?>
