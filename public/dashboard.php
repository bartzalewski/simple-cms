<?php
require_once '../config/database.php';
require_once '../src/Auth.php';
require_once '../src/Post.php';
require_once '../src/User.php';

$auth = new Auth($pdo);
$post = new Post($pdo);
$user = new User($pdo);

if (!$auth->isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$posts = $post->getAllPosts();

include '../templates/header.php';
include '../templates/dashboard.php';
include '../templates/footer.php';
?>
