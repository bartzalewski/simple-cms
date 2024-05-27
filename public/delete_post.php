<?php
require_once '../config/database.php';
require_once '../src/Auth.php';
require_once '../src/Post.php';

$auth = new Auth($pdo);
$post = new Post($pdo);

if (!$auth->isLoggedIn() || !$auth->isAdmin()) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'];
if ($post->deletePost($id)) {
    header('Location: dashboard.php');
} else {
    echo 'Post deletion failed.';
}
?>
